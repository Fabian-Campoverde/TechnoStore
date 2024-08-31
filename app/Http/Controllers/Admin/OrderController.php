<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Mail\OrderApproved;
use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
    {
        $this->middleware("can:admin.orders.index")->only("index");
        $this->middleware("can:admin.orders.create")->only("create","store");
        $this->middleware("can:admin.orders.edit")->only("edit","update","status");
        $this->middleware("can:admin.orders.destroy")->only("destroy");
        $this->middleware("can:admin.orders.show")->only("show");
        $this->middleware("can:admin.orders.pendiente")->only("indexPendiente");
        $this->middleware("can:admin.orders.enviado")->only("indexEnviado");
        $this->middleware("can:admin.orders.cancelado")->only("indexCancelado");
    }

    public function index()
    {
        // $orders = Order::with('paymentMethod', 'orderDetails')->where('status', 'Pendiente')->get();

        // // Itera sobre cada orden para ajustar su created_at al huso horario de Lima.
        // foreach ($orders as $order) {
        //     $order->created_at = Carbon::parse($order->created_at)->setTimezone('America/Lima');
        // }
        // return view('admin.orders.index', compact('orders'));
    }
    

    public function indexPendiente()
    {
        $orders = Order::with('paymentMethod', 'orderDetails')->where('status', 'Pendiente')->get();

        foreach ($orders as $order) {
            $order->created_at = Carbon::parse($order->created_at)->setTimezone('America/Lima');
        }
        return view('admin.orders.index', compact('orders'));
    }

    public function indexEnviado()
    {
        $orders = Order::with('paymentMethod', 'orderDetails')->where('status', 'Enviado')->get();

        foreach ($orders as $order) {
            $order->created_at = Carbon::parse($order->created_at)->setTimezone('America/Lima');
        }
        return view('admin.orders.index', compact('orders'));
    }

    public function indexCancelado()
    {
        $orders = Order::with('paymentMethod', 'orderDetails')->where('status', 'Cancelado')->get();

        foreach ($orders as $order) {
            $order->created_at = Carbon::parse($order->created_at)->setTimezone('America/Lima');
        }
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        DB::beginTransaction();

        try {
            $paymentImage = $request->file('payment_image');
            $data = $request->all();
            if ($paymentImage && $paymentImage->isValid()) {
                $imagePath = $paymentImage->store('orders');
                $data['payment_image'] = $imagePath;
            } else {
                $data['payment_image'] = null; // Asegura que el campo sea nulo si no se carga una imagen
            }

            // Crea la orden
            $order = Order::create([
                'user_id' => $data['user_id'],
                'order_number' => $data['order_number'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'document_type' => $data['document_type'],
                'document_number' => $data['document_number'],
                'address' => $data['address'],
                'department' => $data['department'],
                'province' => $data['province'],
                'district' => $data['district'],
                'zone' => $data['zone'],
                'reference' => $data['reference'],
                'payment_method_id' => $data['payment_method_id'],
                'payment_image' => $data['payment_image'],
                'payment_date' => $data['payment_date'],
                'operation_code' => $data['operation_code'],
                'total' => $data['total'],
            ]);

            // Obtener el ID de la orden recién creada
            $orderId = $order->id;

            // Procesa los detalles de la orden
            $detalles = json_decode($data['detalles'], true);

            // Verificar que la decodificación fue exitosa y que hay items
            if ($detalles && isset($detalles['items'])) {


                foreach ($detalles['items'] as $item) {
                    // Crear un nuevo detalle del pedido
                    OrderDetail::create([
                        'order_id' => $orderId,
                        'product_id' => $item['id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                        'subtotal' => $item['price'] * $item['quantity']
                    ]);
                }
            }
            $order->created_at = Carbon::parse($order->created_at)->setTimezone('America/Lima');
            // Confirmar la transacción
            DB::commit();
            // Limpiar el carrito de la sesión
            session()->forget('cart');
            // Enviar el correo de confirmación
            Mail::to($order->email)->send(new OrderConfirmationMail($order, $detalles));

            // Devolver una respuesta JSON con el ID de la orden
            return response()->json(['order_id' => $orderId]);
        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
            DB::rollBack();

            return redirect()->back()->withErrors('Ocurrió un error: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // Cargar las relaciones necesarias: paymentMethod y orderDetails.product
        $order = Order::with('paymentMethod', 'orderDetails.product')->find($order->id);

        // Verificar si la orden existe
        if ($order) {
            // Obtener los detalles de la orden
            $orderDetails = $order->orderDetails;

            // Retornar la orden y sus detalles como respuesta JSON
            return response()->json([
                'order' => $order,
                'orderDetails' => $orderDetails,
            ]);
        } else {
            // Si la orden no existe, retornar un error 404
            return response()->json(['error' => 'Orden no encontrada'], 404);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function status(Request $request, Order $order)
    {

        $order->status = $request->estado;
        $order->save();
        if ($order->status === 'Aprobado') {
            // Cargar los detalles del pedido junto con la relación de productos
            $order->load('orderDetails.product');

            // Preparar los detalles del pedido
            $detalles = $order->orderDetails;
            
            // Envía el correo al proveedor
            $proveedorEmail = 'fabian.leo2911@gmail.com';
            Mail::to($proveedorEmail)->send(new OrderApproved($order, $detalles));
            $order->status = 'Enviado';
            $order->save();
        }

        // Devolver una respuesta adecuada
        return response()->json([
            'status' => 'success',
            'message' => 'Orden modificada exitosamente.',
        ]);
    }
}
