<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AnioLanzamientoController;
use App\Http\Controllers\ActoreController;
use App\Http\Controllers\ClasificacionController;
use App\Http\Controllers\DirectoreController;
use App\Http\Controllers\FormatoController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


/*
Route::get('/', function () {
    return view('welcome');
});
*/


//RUTAS PARA EL USUARIO
Route::get('/', [UsuarioController::class, 'index'])->name('usuario.index');
Route::get('/createuser', [UsuarioController::class, 'create'])->name('usuario.create');
Route::get('/edit', [UsuarioController::class, 'edit'])->name('usuario.edit');

//RUTAS PARA AÑO DE LANZAMIENTO
Route::get('/Año_Lanzamiento', [AnioLanzamientoController::class, 'index'])->name('anio.index');
Route::get('/Crear_Año', [AnioLanzamientoController::class, 'create'])->name('anio.create');
Route::post('/Guardar_Año', [AnioLanzamientoController::class, 'store'])->name('anio.store');
Route::put('/update/{id}', [AnioLanzamientoController::class, 'update'])->name('anio.update');
Route::get('/Editar_Año/{id}', [AnioLanzamientoController::class, 'edit'])->name('anio.edit');
Route::get('/Eliminar_Año/{id}', [AnioLanzamientoController::class, 'destroy'])->name('anio.destroy');


//RUTAS PARA ACTORES
Route::get('/Actores', [ActoreController::class, 'index'])->name('actore.index');
Route::get('/Crear_Actores', [ActoreController::class, 'create'])->name('actore.create');
Route::post('/Guardar_Actores', [ActoreController::class, 'store'])->name('actore.store');
Route::put('/update/{id}', [ActoreController::class, 'update'])->name('actore.update');
Route::get('/Editar_Actor/{id}', [ActoreController::class, 'edit'])->name('actore.edit');
Route::get('/Eliminar_Actor/{id}', [ActoreController::class, 'destroy'])->name('actore.destroy');


//RUTAS PARA CLASIFICACIONES
Route::get('/Clasificaciones', [ClasificacionController::class, 'index'])->name('clasificacion.index');
Route::get('/Crear_Clasificacion', [ClasificacionController::class, 'create'])->name('clasificacion.create');
Route::post('/Guardar_Clasificacion', [ClasificacionController::class, 'store'])->name('clasificacion.store');
Route::put('/update/{id}', [ClasificacionController::class, 'update'])->name('clasificacion.update');
Route::get('/Editar_Clasificacion/{id}', [ClasificacionController::class, 'edit'])->name('clasificacion.edit');
Route::get('/Eliminar_Clasificacion/{id}', [ClasificacionController::class, 'destroy'])->name('clasificacion.destroy');


//RUTAS PARA DIRECTORES
Route::get('/Directores', [DirectoreController::class, 'index'])->name('directore.index');
Route::get('/Crear_Director', [DirectoreController::class, 'create'])->name('directore.create');
Route::post('/Guardar_Director', [DirectoreController::class, 'store'])->name('directore.store');
Route::put('/update/{id}', [DirectoreController::class, 'update'])->name('directore.update');
Route::get('/Editar_Director/{id}', [DirectoreController::class, 'edit'])->name('directore.edit');
Route::get('/Eliminar_Director/{id}', [DirectoreController::class, 'destroy'])->name('directore.destroy');


//RUTAS PARA FORMATOS
Route::get('/Formatos', [FormatoController::class, 'index'])->name('formato.index');
Route::get('/Crear_Formato', [FormatoController::class, 'create'])->name('formato.create');
Route::post('/Guardar_Formato', [FormatoController::class, 'store'])->name('formato.store');
Route::put('/update/{id}', [FormatoController::class, 'update'])->name('formato.update');
Route::get('/Editar_Formato/{id}', [FormatoController::class, 'edit'])->name('formato.edit');
Route::get('/Eliminar_Formato/{id}', [FormatoController::class, 'destroy'])->name('formato.destroy');


//RUTAS PARA GENEROS
Route::get('/Generos', [GeneroController::class, 'index'])->name('genero.index');
Route::get('/Crear_Genero', [GeneroController::class, 'create'])->name('genero.create');
Route::post('/Guardar_Genero', [GeneroController::class, 'store'])->name('genero.store');
Route::put('/update/{id}', [GeneroController::class, 'update'])->name('genero.update');
Route::get('/Editar_Genero/{id}', [GeneroController::class, 'edit'])->name('genero.edit');
Route::get('/Eliminar_Genero/{id}', [GeneroController::class, 'destroy'])->name('genero.destroy');



//RUTAS PARA IDIOMAS
Route::get('/Idiomas', [IdiomaController::class, 'index'])->name('idioma.index');
Route::get('/Crear_Idioma', [IdiomaController::class, 'create'])->name('idioma.create');
Route::post('/Guardar_Idioma', [IdiomaController::class, 'store'])->name('idioma.store');
Route::put('/update/{id}', [IdiomaController::class, 'update'])->name('idioma.update');
Route::get('/Editar_Idioma/{id}', [IdiomaController::class, 'edit'])->name('idioma.edit');
Route::get('/Eliminar_Idioma/{id}', [IdiomaController::class, 'destroy'])->name('idioma.destroy');



//RUTAS PARA PELICULAS
Route::get('/', [PeliculaController::class, 'index'])->name('pelicula.index');
Route::get('/Crear_Pelicula', [PeliculaController::class, 'create'])->name('pelicula.create');
Route::post('/Guardar_Pelicula', [PeliculaController::class, 'store'])->name('pelicula.store');
Route::put('/update/{id}', [PeliculaController::class, 'update'])->name('pelicula.update');
Route::get('/Editar_Pelicula/{id}', [PeliculaController::class, 'edit'])->name('pelicula.edit');
Route::get('/Eliminar_Pelicula/{id}', [PeliculaController::class, 'destroy'])->name('pelicula.destroy');
/* Route::get('/Detalle_Pelicula/{id}',[PeliculaController::class, 'portada'])->name('pelicula.portada'); */

Route::get('/DetallePelicula/{id}',[PeliculaController::class, 'detalle'])->name('pelicula.detalles');
Route::get('/Peliculas',[PeliculaController::class,'todas'])->name('pelicula.todas');
/*PARA LOS ADMIN */
Route::get('/Inicio', [PeliculaController::class, 'indexadmin'])->name('pelicula.indexadmin');
Route::get('/EliminarPelicula/{id}', [PeliculaController::class, 'destroyadmin'])->name('pelicula.destroyadmin');


/* RUTA PARA EL LOGIN */
Route::get('/login', 'AuthController@showLoginForm')->name('login.form');
Route::post('/login', 'AuthController@login')->name('login');
