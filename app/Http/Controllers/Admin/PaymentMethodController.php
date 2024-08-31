<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentMethodRequest;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware("can:admin.payment_methods.index")->only("index");
        $this->middleware("can:admin.payment_methods.create")->only("create","store");
        $this->middleware("can:admin.payment_methods.edit")->only("edit","update","status");
        $this->middleware("can:admin.payment_methods.destroy")->only("destroy");

    }
    public function index()
    {
        $metodos_pago = PaymentMethod::all();
       
        return view("admin.metodos_pago.index",compact('metodos_pago'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paymentMethod = new PaymentMethod();
        return view("admin.metodos_pago.create", compact("paymentMethod"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentMethodRequest  $request)
    {
        $data=$request->all();
         
        
        if($request->has("imagen")){
        $image_path=$request->file("imagen")->store("medias");
        $data["imagen"]=$image_path;
        PaymentMethod::create($data);
        }
        
        return redirect()->route("admin.payment_methods.index")->with(
            [
                "message"=> "Medio de pago creado con exito",
                "status"=>"success",
                "color"=>"green"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        return view("admin.metodos_pago.create", compact("paymentMethod"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentMethodRequest $request, PaymentMethod $paymentMethod)
    {
        $data=$request->all();
        if($request->has("imagen")){
            Storage::delete($paymentMethod->imagen);
        $image_path=$request->file("imagen")->store("medias");
        $data["imagen"]=$image_path;
        }
        $paymentMethod->fill($data);
        $paymentMethod->save();
        return redirect()->route("admin.payment_methods.index")->with(
            [
                "message"=> "Medio de pago actualizado con exito",
                "status"=>"success",
                "color"=>"blue"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        try {
            $paymentMethod->delete();
            $result= [
                "message"=> "Medio de Pago eliminado con exito",
                "status"=>"success",
                "color"=>"gray"
            ];
        } catch (\Throwable $th) {
            $result = [
                "message"=> "Medio de Pago no puede ser eliminado",
                "status"=>"error",
                "color"=>"red"
            ];
        }
        
        return redirect()->route("admin.payment_methods.index")->with($result);
    }

    public function status(Request $request,PaymentMethod $paymentMethod)
    {
        $paymentMethod->estado = $request->estado;
        $paymentMethod->save();
        return response()->json(['message' => 'Medio de Pago modificado exitosamente']);
    }
}
