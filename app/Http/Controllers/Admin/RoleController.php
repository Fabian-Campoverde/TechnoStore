<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware("can:admin.roles.index")->only("index");
        $this->middleware("can:admin.roles.create")->only("create","store");
        $this->middleware("can:admin.roles.edit")->only("edit","update");
        $this->middleware("can:admin.roles.destroy")->only("destroy");

    }
    public function index()
    {
        $role= Role::paginate(5);
        return view("admin.roles.index",compact("role"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role= new Role();
        $permissions= Permission::all();
        
        return view("admin.roles.create",compact("role","permissions"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $data= $request->all();
        $role= Role::create($data);
        $role->permissions()->sync($request->permissions);
        return redirect()->route("admin.roles.index")->with(
            [
                "message"=> "Rol creado con exito",
                "status"=>"success",
                "color"=>"green"
            ]
        );

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
    public function edit(Role $role)
    {
        $permissions= Permission::all();
       
        return view("admin.roles.create",compact("role","permissions"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        
        $data= $request->all();
        $role->fill($data);
        $role->permissions()->sync($request->permissions);
        $role->save();
        return redirect()->route("admin.roles.index")->with(
            [
                "message"=> "Rol actualizado con exito",
                "status"=>"success",
                "color"=>"blue"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        try {
            $role->delete();
            $result= [
                "message"=> "Rol eliminado con exito",
                "status"=>"success",
                "color"=>"gray"
            ];
        } catch (\Throwable $th) {
            $result = [
                "message"=> "Rol no puede ser eliminado",
                "status"=>"error",
                "color"=>"red"
            ];
        }
        
        return redirect()->route("admin.roles.index")->with($result);
    }
}
