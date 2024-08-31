<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MeasureRequest;
use App\Models\Measure;
use Illuminate\Http\Request;

class MeasureController extends Controller
{
    public function __construct()
    {
        $this->middleware("can:admin.measures.index")->only("index");
        $this->middleware("can:admin.measures.create")->only("create","store");
        $this->middleware("can:admin.measures.edit")->only("edit","update","status");
        $this->middleware("can:admin.measures.destroy")->only("destroy");

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $measures = Measure::paginate();
        return view("admin.medidas.index", compact("measures"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $measures= new Measure();
        return view("admin.medidas.create", compact("measures"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MeasureRequest $request)
    {
        $data= $request->all();
        Measure::create($data);
        return redirect()->route("admin.measures.index")->with(
            [
                "message"=> "Medida creada con exito",
                "status"=>"success",
                "color"=>"green"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Measure $measure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Measure $measure)
    {
        return view("admin.medidas.create",['measures'=> $measure]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Measure $measure)
    {
        $data= $request->all();
        $measure->fill($data);
        $measure->save();
        return redirect()->route('admin.measures.index')->with(
            [
                "message"=> "Medida actualizada con exito",
                "status"=>"success",
                "color"=>"blue"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Measure $measure)
    {
        try {
            $measure->delete();
            $result= [
                "message"=> "Medida eliminada con exito",
                "status"=>"success",
                 "color"=>"gray"
            ];
        } catch (\Throwable $th) {
            $result = [
                "message"=> "Medida no puede ser eliminada por asociacion ",
                "status"=>"error",
                "color"=>"red"
            ];
        }
        return redirect()->route("admin.measures.index")->with($result);
    }

    public function status(Request $request,Measure $measure)
{
    $measure->estado = $request->estado;
    $measure->save();
    return response()->json(['message' => 'Medida modificada exitosamente']);
}
}
