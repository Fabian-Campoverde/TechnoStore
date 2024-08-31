<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
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
        $videos = Video::all();
        return view("admin.videos.index",compact("videos"));
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
        Video::create($data);
        return redirect()->route("admin.videos.index")->with(
            [
                "message"=> "Video creado con exito",
                "status"=>"success",
                "color"=>"green"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $data= $request->all();
        $video->fill($data);
        $video->save();
        return redirect()->route('admin.videos.index')->with(
            [
                "message"=> "Video actualizado con exito",
                "status"=>"success",
                "color"=>"blue"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        try {
            $video->delete();
            $result= [
                "message"=> "Video eliminado con exito",
                "status"=>"success",
                 "color"=>"gray"
            ];
        } catch (\Throwable $th) {
            $result = [
                "message"=> "Video no puede ser eliminado por asociacion ",
                "status"=>"error",
                "color"=>"red"
            ];
        }
        return redirect()->route("admin.videos.index")->with($result);
    }

    public function status(Request $request,Video $video)
{
    $video->estado = $request->estado;
    $video->save();
    return response()->json(['message' => 'Video modificado exitosamente']);
}
}
