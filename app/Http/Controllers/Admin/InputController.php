<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InputRequest;
use App\Models\Input;
use App\Models\InputDetail;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inputs = Input::with('provider', 'inputDetails')->get();
        
        return view('admin.inputs.index',compact('inputs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers= Provider::all();
        $products= Product::all();
        $input= new Input();
        $inputDetails = $input->inputDetails;
        return view('admin.inputs.create',compact('providers','products','input','inputDetails'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InputRequest $request)
    {
        
        $total=0;
        $detallesJSON = $request->input('detalles');
        $detalles = json_decode($detallesJSON, true);

        foreach ($detalles as $detalle) {
            $total_producto = $detalle['total_producto'];
            $total= $total+ $total_producto;
            
        }
        // $fechaCompra = Carbon::createFromFormat('Y/m/d', $request->fechaCompra)->format('Y-m-d');
        $input = Input::create([
            'comprobante' => $request->input('comprobante'),
            'fechaCompra' => $request->fechaCompra,
            'totalCompra'=> $total,
            'provider_id' => $request->input('provider_id'),        
        ]);
    
        // Obtener el ID del Input recién creado
        $inputId = $input->id;

        foreach ($detalles as $detalle) {
            InputDetail::create([
                'product_id' => $detalle['product_id'],
                'input_id' => $inputId, 
                'precio' => $detalle['precio'],
                'cantidad' => $detalle['cantidad'],
                'total_producto' => $detalle['total_producto'],
                
            ]);
           
        $producto = Product::find($detalle['product_id']);

        // Actualizar el stock del producto
        if ($producto) {
            $nuevoStock = $producto->stock + $detalle['cantidad'];
            $producto->update(['stock' => $nuevoStock]);
            $producto->update(['precio_compra' => $detalle['precio']]);
        }
        }
        return redirect()->route("admin.inputs.index")->with(
            [
                "message"=> "Entrada creada con exito",
                "status"=>"success",
                "color"=>"green"
            ]
        );


        
    }

    /**
     * Display the specified resource.
     */
    public function show(Input $input)
    {
        $input = Input::with('provider', 'inputDetails.product')->find($input->id);

    
    if ($input) {
        $inputDetails = $input->inputDetails;

        return response()->json([
            'input' => $input,
            'inputDetails' => $inputDetails, // Devuelve los detalles de inputDetail
        ]);
    } else {
        
        return response()->json(['error' => 'Input no encontrado'], 404);
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Input $input)
    {
        $providers= Provider::all();
        $products= Product::all();
        $inputId = Input::with('inputDetails.product')->find($input->id);
        $inputDetails = $inputId->inputDetails;
        return view('admin.inputs.create',compact('providers','products','input','inputDetails'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Input $input)
    {
        $total = 0;
        $detallesJSON = $request->input('detalles');
        $detalles = json_decode($detallesJSON, true);
    
        foreach ($detalles as $detalle) {
            $total_producto = $detalle['total_producto'];
            $total = $total + $total_producto;
        }
    
        // Actualizar los campos necesarios en el modelo Input
        $input->comprobante = $request->input('comprobante');
        $input->fechaCompra = $request->fechaCompra;
        $input->totalCompra = $total;
        $input->provider_id = $request->input('provider_id');
        
        // Guardar los cambios
        $input->save();
    
        // Eliminar detalles existentes para actualizarlos luego
        $input->inputDetails()->delete();
    
        // Crear nuevos detalles actualizados
        foreach ($detalles as $detalle) {
            $input->inputDetails()->create([
                'product_id' => $detalle['product_id'],
                'precio' => $detalle['precio'],
                'cantidad' => $detalle['cantidad'],
                'total_producto' => $detalle['total_producto'],
            ]);
    
            $producto = Product::find($detalle['product_id']);
    
            // Actualizar el stock del producto
            if ($producto) {
                $nuevoStock = $producto->stock + $detalle['cantidad'];
                $producto->update(['stock' => $nuevoStock]);
            }
        }
    
        return redirect()->route("admin.inputs.index")->with(
            [
                "message"=> "Entrada actualizada con éxito",
                "status"=>"success",
                "color"=>"green"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Input $input)
    {
        try {
            $input->inputDetails()->delete();

        
        $input->delete();
            $result= [
                "message"=> "Entrada eliminada con exito",
                "status"=>"success",
                "color"=>"gray"
            ];
        } catch (\Throwable $th) {
            $result = [
                "message"=> "Entrada no puede ser eliminada",
                "status"=>"error",
                "color"=>"red"
            ];
        }
        
        return redirect()->route("admin.inputs.index")->with($result);
        
    
    
    }
}
