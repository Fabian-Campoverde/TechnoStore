<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("can:admin.users.index")->only("index");
        $this->middleware("can:admin.users.create")->only("create","store");
        $this->middleware("can:admin.users.edit")->only("edit","update");
        $this->middleware("can:admin.users.destroy")->only("destroy");

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users= User::all();
        return view("admin.users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user= new User();
        $roles= Role::all();
        return view("admin.users.create",compact("user","roles"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            $user= User::create([
                "name"=> $request->name,
                "nickname"=> $request->nickname,
                "email"=> $request->email,
                "password"=> bcrypt($request->password)
                
            ]);
            if ($request->has("image_url")) {
                $image_path = $request->file("image_url")->store("medias");
                $user->image_url = $image_path;
                $user->save(); // Guardar la ruta de la imagen en la base de datos
            }
           $user->roles()->sync($request->roles);
           return redirect()->route("admin.users.index")->with(
            [
                "message"=> "Usuario creado con exito",
                "status"=>"success",
                "color"=>"green"
            ]
        );
        } catch (\Throwable $th) {
            return redirect()->route("admin.users.index")->with(
                [
                    "message"=> "Error al crear usuario (Posible error de email registrado)",
                    "status"=>"success",
                    "color"=>"red"
                ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        
        $roles= Role::all();  
        return view("admin.users.create",compact("user","roles"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'nickname' => 'required|unique:users,nickname,' . $user->id,
            'password' => 'min:6',
        ]);
        try {

            
            $data=$request->all();
            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password);
            }
            
            if ($request->has("image_url")) {
                if ($user->image_url) {
                    Storage::delete($user->image_url);
                }
            
                $image_path = $request->file("image_url")->store("medias");
                $data["image_url"] = $image_path;
            }
            $user->fill($data);
            $user->roles()->sync($request->roles);
            $user->save();
           
           return redirect()->route("admin.users.index")->with(
            [
                "message"=> "Usuario actualizado con exito",
                "status"=>"success",
                "color"=>"green"
            ]
        );
        } catch (\Throwable $th) {
            
            return redirect()->route("admin.users.index")->with(
                [
                    "message"=> "Error al actualizar usuario ",
                    "status"=>"success",
                    "color"=>"red"
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            $result= [
                "message"=> "Usuario eliminado con exito",
                "status"=>"success",
                "color"=>"gray"
            ];
        } catch (\Throwable $th) {
            $result = [
                "message"=> "Usuario no puede ser eliminado",
                "status"=>"error",
                "color"=>"red"
            ];
        }
        
        return redirect()->route("admin.users.index")->with($result);
    }
}
