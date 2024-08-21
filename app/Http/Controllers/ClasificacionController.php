<?php

namespace App\Http\Controllers;

use App\Models\Clasificacion;
use Illuminate\Http\Request;

class ClasificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Clasificacion::all();
        return view('Clasificacion/index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Clasificacion/insertar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nombre = new Clasificacion();
        $nombre-> NOMBRE = $request->post('NOMBRE');
        $nombre->save();

        return redirect()->route("clasificacion.index")->with("succes","Agregado con exito!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Clasificacion $clasificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nombre = Clasificacion::find($id);
        return view('Clasificacion/editar', compact('nombre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $nombre = Clasificacion::find($id);
        $nombre-> NOMBRE = $request->post('NOMBRE');
        $nombre->save();

        return redirect()->route("clasificacion.index")->with("succes","Actualizado con exito!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nombre = Clasificacion::find($id);
        $nombre ->delete();

        return redirect()->route("clasificacion.index")->with("succes","Eliminado con exito!");
    }
}
