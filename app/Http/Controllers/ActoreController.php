<?php

namespace App\Http\Controllers;

use App\Models\Actore;
use Illuminate\Http\Request;

class ActoreController extends Controller
{
    
    public function index()
    {
        //pagina de inicio
        $datos = Actore::all();
        return view('Actor/index', compact('datos'));
    }

    
    public function create()
    {
        //formulario donde agregamos datos
        return view('Actor/insertar');
    }

    public function store(Request $request)
    {
        //sirve parqa guardar datos en la bd
        $nombre = new Actore();
        $nombre-> NOMBRE = $request->post('NOMBRE');
        $nombre->save();

        return redirect()->route("actore.index")->with("succes","Agregado con exito!");
    }

    public function show(Actore $actore)
    {
        //servira para obtener un registro de la tabla
    }

    public function edit($id)
    {
        //sirve para traer los datos que se van a editar y los pone en un formulario
        $nombre = Actore::find($id);
        return view('Actor/editar', compact('nombre'));
    }

    public function update(Request $request,  $id)
    {
        //actualiza los datos en la bd
        $nombre = Actore::find($id);
        $nombre-> NOMBRE = $request->post('NOMBRE');
        $nombre->save();

        return redirect()->route("actore.index")->with("succes","Actualizado con exito!");
    }

    public function destroy($id)
    {
        //elimina un registro
        $nombre = Actore::find($id);
        $nombre ->delete();

        return redirect()->route("actore.index")->with("succes","Eliminado con exito!");
    }
}
