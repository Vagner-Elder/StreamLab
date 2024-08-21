<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Actore;
use App\Models\Directore;
use App\Models\Formato;
use App\Models\Genero;
use App\Models\Idioma;
use App\Models\AnioLanzamiento;
use App\Models\Clasificacion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeliculaController extends Controller
{


    public function index()
    {
        //$peliculas = Pelicula::all();
        $generos = Genero::all();
        $peliculaCarroselRecientes = Pelicula::orderBy('ID', 'desc')->limit(8)->get();
        
        $peliculaCarroselAccion = Pelicula::whereHas('generos',
            function($query){
                $query->where('NOMBRE','ACCION');
            })->take(8)->get();

        $peliculaCarroselTerror = Pelicula::whereHas('generos',
            function($query){
                $query->where('NOMBRE','TERROR');
            })->take(8)->get();
                
        $peliculaReciente = Pelicula::orderBy('ID', 'desc')->first();
        $peliculas = Pelicula::with(['anio_lanzamiento', 'clasificacion'])->get();
        return view('Peliculas/index', compact('peliculas','peliculaReciente','peliculaCarroselRecientes','peliculaCarroselAccion','generos','peliculaCarroselTerror'));
    }


    public function create()
    {
        $actores = Actore::all();
        $peliculaActoresIds = [];

        $directores = Directore::all();
        $peliculaDirectoresIds = [];

        $formatos = Formato::all();
        $peliculaFormatoIds = [];

        $generos = Genero::all();
        $peliculaGenerosIds = [];

        $idiomas = Idioma::all();
        $peliculaIdiomasIds = [];

        $anioLanzamientos = AnioLanzamiento::all();
        $clasificaciones = Clasificacion::all();

        return view(
            'Peliculas/insertar',
            compact(
                'actores',
                'peliculaActoresIds',
                'directores',
                'peliculaDirectoresIds',
                'formatos',
                'peliculaFormatoIds',
                'generos',
                'peliculaGenerosIds',
                'idiomas',
                'peliculaIdiomasIds',
                'anioLanzamientos',
                'clasificaciones'
            )
        );
    }

    public function store(Request $request)
    {

        $pelicula = Pelicula::create($request->except(['actores', 'directores', 'formatos', 'generos', 'idiomas']));

        $actoresSeleccionados = $request->input('actores');
        if (!empty($actoresSeleccionados)) {
            $pelicula->actores()->attach($actoresSeleccionados);
        }


        $directoresSeleccionados = $request->input('directores');
        if (!empty($directoresSeleccionados)) {
            $pelicula->directores()->attach($directoresSeleccionados);
        }

        $formatosSeleccionados = $request->input('formatos');
        if (!empty($formatosSeleccionados)) {
            $pelicula->formatos()->attach($formatosSeleccionados);
        }

        $generosSeleccionados = $request->input('generos');
        if (!empty($generosSeleccionados)) {
            $pelicula->generos()->attach($generosSeleccionados);
        }

        $idiomasSeleccionados = $request->input('idiomas');
        if (!empty($idiomasSeleccionados)) {
            $pelicula->idiomas()->attach($idiomasSeleccionados);
        }

        return redirect()->route('pelicula.index');
    }


    public function show($id)
    {
        //
        $pelicula = Pelicula::findOrFail($id);
        return view('Peliculas/editar', compact('pelicula'));
    }


    public function edit($id)
    {
        //
        $pelicula = Pelicula::findOrFail($id);

        $actores = Actore::all();
        $peliculaActoresIds = $pelicula->actores->pluck('ID')->all();

        $directores = Directore::all();
        $peliculaDirectoresIds = $pelicula->directores->pluck('ID')->all();

        $formatos = Formato::all();
        $peliculaFormatosIds = $pelicula->formatos->pluck('ID')->all();

        $generos = Genero::all();
        $peliculaGenerosIds = $pelicula->generos->pluck('ID')->all();

        $idiomas = Idioma::all();
        $peliculaIdiomasIds = $pelicula->idiomas->pluck('ID')->all();

        $anioLanzamientos = AnioLanzamiento::all();
        $clasificaciones = Clasificacion::all();

        return view(
            'Peliculas/editar',
            compact(
                'pelicula',
                'actores',
                'peliculaActoresIds',
                'directores',
                'peliculaDirectoresIds',
                'formatos',
                'peliculaFormatosIds',
                'generos',
                'peliculaGenerosIds',
                'idiomas',
                'peliculaIdiomasIds',
                'anioLanzamientos',
                'clasificaciones'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $pelicula = Pelicula::findOrFail($id);
        $pelicula->update($request->except('actores'));
        $actoresSeleccionados = $request->input('actores');
        $pelicula->actores()->sync($actoresSeleccionados);

        $pelicula->update($request->except('directores'));
        $directoresSeleccionados = $request->input('directores');
        $pelicula->directores()->sync($directoresSeleccionados);

        $pelicula->update($request->except('formatos'));
        $formatosSeleccionados = $request->input('formatos');
        $pelicula->formatos()->sync($formatosSeleccionados);

        $pelicula->update($request->except('generos'));
        $generosSeleccionados = $request->input('generos');
        $pelicula->generos()->sync($generosSeleccionados);

        $pelicula->update($request->except('idiomas'));
        $idiomasSeleccionados = $request->input('idiomas');
        $pelicula->idiomas()->sync($idiomasSeleccionados);

        return redirect()->route('pelicula.index');
    }

    public function destroy($id)
    {

        $pelicula = Pelicula::findOrFail($id);

        $pelicula->actores()->detach();
        $pelicula->directores()->detach();
        $pelicula->formatos()->detach();
        $pelicula->generos()->detach();
        $pelicula->idiomas()->detach();

        $pelicula->delete();
        return redirect()->route('pelicula.index');
    }

    public function paginicio()
    {
        //$peliculas = Pelicula::all();
        $peliculaCarroselRecientes = Pelicula::orderBy('ID', 'desc')->limit(8)->get();
        
        $peliculaCarroselAccion = Pelicula::whereHas('generos',
            function($query){
                $query->where('NOMBRE','ACCION');
            })->take(8)->get();
                
            $peliculaCarroselTerror = Pelicula::whereHas('generos',
            function($query){
                $query->where('NOMBRE','TERROR');
            })->take(8)->get();
        
        $peliculaReciente = Pelicula::orderBy('ID', 'desc')->first();
        $peliculas = Pelicula::with(['anio_lanzamiento', 'clasificacion'])->get();
        return view('Peliculas/index', compact('peliculas','peliculaReciente','peliculaCarroselRecientes','peliculaCarroselAccion','peliculaCarroselTerror'));
    }

    // En el controlador PeliculaController
    public function detalle($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $generos = Genero::all();
        $peliculaCarroselAccion = Pelicula::whereHas('generos', function($query) {
            $query->where('NOMBRE', 'ACCION');
            })->take(8)->get();
        $peliculaCarroselRecientes = Pelicula::orderBy('ID', 'desc')->limit(8)->get();
        $peliculaReciente = Pelicula::orderBy('ID', 'desc')->first();
    
        return view('Peliculas/detalles', compact('pelicula', 'peliculaReciente', 'peliculaCarroselRecientes', 'peliculaCarroselAccion','generos'));  
    }

    public function indexadmin()
    {
        //$peliculas = Pelicula::all();
        $peliculaCarroselRecientes = Pelicula::orderBy('ID', 'desc')->limit(3)->get();
        
        $peliculaCarroselAccion = Pelicula::whereHas('generos',
            function($query){
                $query->where('NOMBRE','ACCION');
            })->take(8)->get();
        
        $peliculaCarroselTerror = Pelicula::whereHas('generos',
            function($query){
                $query->where('NOMBRE','TERROR');
            })->take(8)->get();
        $peliculaReciente = Pelicula::orderBy('ID', 'desc')->first();
        $peliculas = Pelicula::with(['anio_lanzamiento', 'clasificacion'])->get();
        return view('Peliculas/indexadmin', compact('peliculas','peliculaReciente','peliculaCarroselRecientes','peliculaCarroselAccion','peliculaCarroselTerror'));
    }

    public function destroyadmin($id)
    {

        $pelicula = Pelicula::findOrFail($id);

        $pelicula->actores()->detach();
        $pelicula->directores()->detach();
        $pelicula->formatos()->detach();
        $pelicula->generos()->detach();
        $pelicula->idiomas()->detach();

        $pelicula->delete();
        return redirect()->route('pelicula.indexadmin');
    }

    public function todas()
    {
        $generos = Genero::all();
        $peliculas = Pelicula::paginate(30);
        return view('Peliculas/todos',compact('peliculas','generos'));
    }
}


