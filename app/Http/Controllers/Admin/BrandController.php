<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function __construct()
     {
         $this->middleware("can:admin.categories.index")->only("index");
         $this->middleware("can:admin.categories.create")->only("create","store");
         $this->middleware("can:admin.categories.edit")->only("edit","update","status");
         $this->middleware("can:admin.categories.destroy")->only("destroy");
 
     }
     public function index()
    {
        $brands= Brand::all();
        return view("admin.marcas.index", compact("brands"));
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
    public function store(BrandRequest $request)
    {
        $data= $request->all();
        if($request->has("imagen")){
            $image_path=$request->file("imagen")->store("medias");
            $data["imagen"]=$image_path;
            Brand::create($data);
            }
        
        return redirect()->route("admin.brands.index")->with(
            [
                "message"=> "Marca creada con exito",
                "status"=>"success",
                "color"=>"green"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        // Validar el request con un validador manual
    $validator = Validator::make($request->all(), [
        'nombre' => [
            'required',
            Rule::unique('brands')->ignore($brand->id),
        ],
        // Otras reglas de validación...
    ]);

    // Si la validación falla, devolver una respuesta JSON con el error 422
    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }
        $data=$request->all();
        if($request->has("imagen1")){
            if ($brand->imagen) {
                Storage::delete($brand->imagen);
            }
        
            // Almacenar la nueva imagen y actualizar el campo "imagen" en los datos
            $image_path = $request->file('imagen1')->store('medias');
            $data['imagen'] = $image_path;
        }
        $brand->fill($data);
        $brand->save();
        return redirect()->route('admin.brands.index')->with(
            [
                "message"=> "Marca actualizada con exito",
                "status"=>"success",
                "color"=>"blue"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        try {
            $brand->delete();
            $result= [
                "message"=> "Marca eliminada con exito",
                "status"=>"success",
                 "color"=>"gray"
            ];
        } catch (\Throwable $th) {
            $result = [
                "message"=> "Marca no puede ser eliminada por asociacion ",
                "status"=>"error",
                "color"=>"red"
            ];
        }
        return redirect()->route("admin.brands.index")->with($result);
    }

    public function status(Request $request,Brand $brand)
{
    $brand->estado = $request->estado;
    $brand->save();
    return response()->json(['message' => 'Marca modificada exitosamente']);
}
}
