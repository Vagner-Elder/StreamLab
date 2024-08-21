<?php

namespace App\Http\Controllers;

use App\Models\AnioLanzamiento;
use Illuminate\Http\Request;

class AnioLanzamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = AnioLanzamiento::all();
        return view('AnioLanzamiento/index', compact('datos'));
    }

 
    public function create()
    {
        //
        return view('AnioLanzamiento/insertar');
    }


    public function store(Request $request)
    {
        //
        $anio = new AnioLanzamiento();
        $anio-> ANIO = $request->post('ANIO');
        $anio->save();

        return redirect()->route("anio.index")->with("succes","Agregado con exito!");
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
       // $anio = AnioLanzamiento::find($id);
       // return view('AnioLanzamiento/insertar',compact('anio'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $anio = AnioLanzamiento::find($id);
        return view('AnioLanzamiento/editar', compact('anio'));

    }
 
    public function update(Request $request,  $id)
    {
        $anio = AnioLanzamiento::find($id);
        $anio-> ANIO = $request->post('ANIO');
        $anio->save();

        return redirect()->route("anio.index")->with("succes","Actualizado con exito!");
    }

    public function destroy($id)
    {
        //
        $anio = AnioLanzamiento::find($id);
        $anio ->delete();

        return redirect()->route("anio.index")->with("succes","Eliminado con exito!");
    }
}
