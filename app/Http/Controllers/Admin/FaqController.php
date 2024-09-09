<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
    {
        $this->middleware("can:admin.videos.index")->only("index");
        $this->middleware("can:admin.videos.create")->only("create","store");
        $this->middleware("can:admin.videos.edit")->only("edit","update","status");
        $this->middleware("can:admin.videos.destroy")->only("destroy");

    }
    public function index()
    {
        $faqs = Faq::all();
        return view("admin.faqs.index",compact("faqs"));
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
    public function store(Request $request)
    {
        $data= $request->all();
        Faq::create($data);
        return redirect()->route("admin.faqs.index")->with(
            [
                "message"=> "Pregunta creada con exito",
                "status"=>"success",
                "color"=>"green"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $data= $request->all();
        $faq->fill($data);
        $faq->save();
        return redirect()->route('admin.faqs.index')->with(
            [
                "message"=> "Pregunta actualizada con exito",
                "status"=>"success",
                "color"=>"blue"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        try {
            $faq->delete();
            $result= [
                "message"=> "Pregunta eliminada con exito",
                "status"=>"success",
                 "color"=>"gray"
            ];
        } catch (\Throwable $th) {
            $result = [
                "message"=> "Pregunta no puede ser eliminada por asociacion ",
                "status"=>"error",
                "color"=>"red"
            ];
        }
        return redirect()->route("admin.faqs.index")->with($result);
    }

    public function status(Request $request,Faq $faq)
{
    $faq->estado = $request->estado;
    $faq->save();
    return response()->json(['message' => 'Pregunta modificada exitosamente']);
}
}
