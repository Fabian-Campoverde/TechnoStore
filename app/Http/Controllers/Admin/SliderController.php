<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware("can:admin.sliders.index")->only("index");
        $this->middleware("can:admin.sliders.create")->only("create","store");
        $this->middleware("can:admin.sliders.edit")->only("edit","update","status");
        $this->middleware("can:admin.sliders.destroy")->only("destroy");

    }
    public function index()
    {
        $sliders= Slider::all();
        return view("admin.sliders.index",compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $slider = new Slider();
        return view("admin.sliders.create", compact("slider"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $data=$request->all();
         
        
        if($request->has("imagen")){
        $image_path=$request->file("imagen")->store("medias");
        $data["imagen"]=$image_path;
        Slider::create($data);
        }
        
        return redirect()->route("admin.sliders.index")->with(
            [
                "message"=> "Slider creado con exito",
                "status"=>"success",
                "color"=>"green"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view("admin.sliders.create", compact("slider"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        $data=$request->all();
        if($request->has("imagen")){
            Storage::delete($slider->imagen);
        $image_path=$request->file("imagen")->store("medias");
        $data["imagen"]=$image_path;
        }
        $slider->fill($data);
        $slider->save();
        return redirect()->route("admin.sliders.index")->with(
            [
                "message"=> "Slider actualizado con exito",
                "status"=>"success",
                "color"=>"blue"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        try {
            $slider->delete();
            $result= [
                "message"=> "Slider eliminado con exito",
                "status"=>"success",
                "color"=>"gray"
            ];
        } catch (\Throwable $th) {
            $result = [
                "message"=> "Slider no puede ser eliminado",
                "status"=>"error",
                "color"=>"red"
            ];
        }
        
        return redirect()->route("admin.sliders.index")->with($result);
    }

    public function status(Request $request,Slider $slider)
    {
        $slider->estado = $request->estado;
        $slider->save();
        return response()->json(['message' => 'Slider modificado exitosamente']);
    }

    
}
