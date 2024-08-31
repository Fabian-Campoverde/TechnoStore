<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceRequest;
use App\Http\Requests\InvoiceUpdateRequest;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices= Invoice::all();
        return view('admin.comprobantes.index', compact('invoices'));
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
    public function store(InvoiceRequest $request)
    {

        $data= $request->all();
        if ($request->correlativo === null ) {
            $data['correlativo'] = 0;
        }
         Invoice::create($data);
         return redirect()->route("admin.invoices.index")->with(
            [
                "message"=> "Comprobante creado con exito",
                "status"=>"success",
                "color"=>"green"
            ]
         );
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceUpdateRequest $request, Invoice $invoice)
    {
        $data= $request->all();
        if ($request->correlativo === null) {
            $data['correlativo'] = 0;
        }
        $invoice->fill($data);
        $invoice->save();
        return redirect()->route("admin.invoices.index")->with(
            [
                "message"=> "Comprobante actualizado con exito",
                "status"=>"success",
                "color"=>"blue"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        try {
            $invoice->delete();
            $result= [
                "message"=> "Comprobante eliminado con exito",
                "status"=>"success",
                 "color"=>"gray"
            ];
        } catch (\Throwable $th) {
            $result = [
                "message"=> "Comprobante no puede ser eliminado por asociacion ",
                "status"=>"error",
                "color"=>"red"
            ];
        }
        
        return redirect()->route("admin.invoices.index")->with($result);
    }
}
