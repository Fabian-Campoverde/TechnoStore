<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware("can:admin.categories.index")->only("index");
        $this->middleware("can:admin.categories.create")->only("create","store");
        $this->middleware("can:admin.categories.edit")->only("edit","update","status");
        $this->middleware("can:admin.categories.destroy")->only("destroy");

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("admin.categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = new Category();
        return view("admin.categories.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data=$request->all();
        // print_r($data);
        
        if($request->has("imagen")){
        $image_path=$request->file("imagen")->store("medias");
        $data["imagen"]=$image_path;
        Category::create($data);
        }
        
        return redirect()->route("admin.categories.index")->with(
            [
                "message"=> "Categoria creada con exito",
                "status"=>"success",
                "color"=>"A4CF79"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //return view("admin.categories.show",compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        
        return view("admin.categories.create",["categories"=> $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validar el request con un validador manual
    $validator = Validator::make($request->all(), [
        'nombre' => [
            'required',
            Rule::unique('categories')->ignore($category->id),
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
            if ($category->imagen) {
                Storage::delete($category->imagen);
            }
        
            // Almacenar la nueva imagen y actualizar el campo "imagen" en los datos
            $image_path = $request->file('imagen1')->store('medias');
            $data['imagen'] = $image_path;
        }
        $category->fill($data);
        $category->save();
        return redirect()->route("admin.categories.index")->with(
            [
                "message"=> "Categoria actualizada con exito",
                "status"=>"success",
                "color"=>"79B9CF"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        
        try {
            $category->delete();
            $result= [
                "message"=> "Categoria eliminada con exito",
                "status"=>"success",
                 "color"=>"B86364"
            ];
        } catch (\Throwable $th) {
            $result = [
                "message"=> "Categoria no puede ser eliminada por asociacion ",
                "status"=>"error",
                "color"=>"E41D1F"
            ];
        }
        
        return redirect()->route("admin.categories.index")->with($result);
    }

    public function status(Request $request,Category $category)
{
    $category->estado = $request->estado;
    $category->save();
    return response()->json(['message' => 'Categoría modificada exitosamente']);
}

}
