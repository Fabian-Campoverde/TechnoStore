<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $stores= Store::all();
        // return view("admin.almacenes.index", compact("stores"));
    }

  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->all();
        Store::create($data);
        return redirect()->route("admin.stores.index")->with(
            [
                "message"=> "Almacen creado con exito",
                "status"=>"success",
                "color"=>"A4CF79"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        $data= $request->all();
        $store->fill($data);
        $store->save();
        return redirect()->route('admin.stores.index')->with(
            [
                "message"=> "Almacen actualizado con exito",
                "status"=>"success",
                "color"=>"79B9CF"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        try {
            $store->delete();
            $result= [
                "message"=> "Almacen eliminado con exito",
                "status"=>"success",
                 "color"=>"B86364"
            ];
        } catch (\Throwable $th) {
            $result = [
                "message"=> "Almacen no puede ser eliminado por asociacion ",
                "status"=>"error",
                "color"=>"E41D1F"
            ];
        }
        return redirect()->route("admin.stores.index")->with($result);
    }

    public function status(Request $request,Store $store)
{
    $store->estado = $request->estado;
    $store->save();
    return response()->json(['message' => 'Almacen modificado exitosamente']);
}
}
