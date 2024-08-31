<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BuyerRequest;
use App\Http\Requests\BuyerUpdateRequest;
use App\Models\buyer;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function show_table(Request $request)
    {
        if ($request->ajax()) {
            $buyers = Buyer::all();
            return response()->json(['data' => $buyers]);
        }

        return view('admin.clientes.index');
    }

    public function index()
    {
        $buyers= Buyer::all();
        return view("admin.clientes.index",compact("buyers"));
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
    public function store(BuyerRequest $request)
    {
        $data= $request->all();
         Buyer::create($data);
         return redirect()->route("admin.buyers.index")->with(
            [
                "message"=> "Cliente creado con exito",
                "status"=>"success",
                "color"=>"green"
            ]
         );
        
    }

    /**
     * Display the specified resource.
     */
    public function show(buyer $buyer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(buyer $buyer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BuyerUpdateRequest $request, Buyer $buyer)
    {
        $data= $request->all();
        $buyer->fill($data);
        $buyer->save();
        return redirect()->route("admin.buyers.index")->with(
            [
                "message"=> "Cliente actualizado con exito",
                "status"=>"success",
                "color"=>"blue"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buyer $buyer)
    {
        try {
            $buyer->delete();
            $result= [
                "message"=> "Cliente eliminado con exito",
                "status"=>"success",
                 "color"=>"gray"
            ];
        } catch (\Throwable $th) {
            $result = [
                "message"=> "Cliente no puede ser eliminado por asociacion ",
                "status"=>"error",
                "color"=>"red"
            ];
        }
        
        return redirect()->route("admin.buyers.index")->with($result);
    }
}
