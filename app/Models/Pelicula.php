<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pelicula
 * 
 * @property int $ID
 * @property string $TITULO
 * @property string $SINOPSIS
 * @property int|null $DURACION
 * @property int|null $anio_lanzamiento_id
 * @property int|null $clasificacion_id
 * @property string|null $PORTADA_URL
 * @property string|null $TRAILER_URL
 * 
 * @property AnioLanzamiento|null $anio_lanzamiento
 * @property Clasificacion|null $clasificacion
 * @property Collection|Actore[] $actores
 * @property Collection|Directore[] $directores
 * @property Collection|Formato[] $formatos
 * @property Collection|Genero[] $generos
 * @property Collection|Idioma[] $idiomas
 *
 * @package App\Models
 */
class Pelicula extends Model
{
	protected $table = 'peliculas';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'anio_lanzamiento_id' => 'int',
		'clasificacion_id' => 'int'
	];

	protected $fillable = [
		'TITULO',
		'SINOPSIS',
		'DURACION',
		'anio_lanzamiento_id',
		'clasificacion_id',
		'CARTEL_URL',
		'PORTADA_URL',
		'TRAILER_URL'
	];

	public function anio_lanzamiento()
	{
		return $this->belongsTo(AnioLanzamiento::class,'anio_lanzamiento_id');
	}

	public function clasificacion()
	{
		return $this->belongsTo(Clasificacion::class,'clasificacion_id');
	}

	public function actores()
	{
		return $this->belongsToMany(Actore::class, 'peliculas_actores', 'ID_PELICULA', 'ID_ACTOR');
	}

	public function directores()
	{
		return $this->belongsToMany(Directore::class, 'peliculas_directores', 'ID_PELICULA', 'ID_DIRECTOR');
	}

	public function formatos()
	{
		return $this->belongsToMany(Formato::class, 'peliculas_formatos', 'ID_PELICULA', 'ID_FORMATO');
	}

	public function generos()
	{
		return $this->belongsToMany(Genero::class, 'peliculas_genero', 'ID_PELICULA', 'ID_GENERO');
	}

	public function idiomas()
	{
		return $this->belongsToMany(Idioma::class, 'peliculas_idioma', 'ID_PELICULA', 'ID_IDIOMA');
	}
}
