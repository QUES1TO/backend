<?php

namespace App\Http\Controllers;

use App\Models\repuesto;
use Illuminate\Http\Request;
use App\Http\Requests\RepuestoRegisterRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;

class RepuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $repuesto = repuesto::where('categoria_id','=',$request->get('id_categoria'))->with('categoria')->get();
        return $this->jsonControllerResponse( $repuesto,200,true);

    }
    public function index2(Request $request)
    {
        //
        $repuesto = repuesto::with('categoria')->get();
        return $this->jsonControllerResponse( $repuesto,200,true);
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
    public function store(RepuestoRegisterRequest $request)
    {
        //
        $validated = $request->validated();
        $user=auth('api')->user();
        

        $image = $request->file('url_imagen');
        $imageName = time() . '.' . $image->extension();
        Storage::disk('public')->put($imageName, file_get_contents($image));

        $data = $request->except('url_imagen');
        $repuesto = repuesto ::create($data);
        $repuesto ->url_imagen = $imageName;
        $repuesto->save();
        $respuesta = [
            "mensaje"=> "repuesto creado con exito!!!!"
        ];
        return $this->jsonControllerResponse( $respuesta,200,true);
    }

    /**
     * Display the specified resource.
     */
    public function show(repuesto $repuesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(repuesto $repuesto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   
    public function update(Request $request, repuesto $repuesto)
    {
        $image = $request->file('url_imagen');
         $imageName = time() . '.' . $image->extension();
         Storage::disk('public')->put($imageName, file_get_contents($image));        
         $repuesto->url_imagen=$imageName;
         $repuesto->nombre=$request->input('nombre');
         $repuesto->cc=$request->input('cc');
         $repuesto->modelo=$request->input('modelo');
         $repuesto->marca=$request->input('marca');
         $repuesto->stock=$request->input('stock');
         $repuesto->descripcion=$request->input('descripcion');
         $repuesto->precio=$request->input('precio');
         $repuesto->categoria_id=$request->input('categoria_id');
         $repuesto->save();
         $respuesta = [
             "mensaje"=> "repuesto actualizado"
         ];
         return $this->jsonControllerResponse( $respuesta,200,true);
         
   
    }


    /**
     * Remove the specified resource from storage.
     */
   
    public function destroy(repuesto $repuesto)
    {
       
        $repuesto->delete();
        $respuesta = [
            "mensaje"=> "repuesto eliminado con exito!!!!"
        ];
        return $this->jsonControllerResponse( $respuesta,200,true);
    }
}
