<?php

namespace App\Http\Controllers;

use App\Models\Adorno;
use Illuminate\Http\Request;
use App\Http\Requests\AdornoRegisterRequest;

class AdornoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(AdornoRegisterRequest $request)
    {
        $validated = $request->validated();
        $adorno = Adorno::create($validated);                
        $respuesta = [
            "mensaje"=> "Adorno creado con exito!!!!"
        ];
        return json_encode($respuesta);
    }

    /**
     * Display the specified resource.
     */
    public function show(Adorno $adorno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adorno $adorno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adorno $adorno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adorno $adorno)
    {
        //
    }
}
