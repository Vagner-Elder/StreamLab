<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PeliculasIdioma
 * 
 * @property int $ID_PELICULA
 * @property int $ID_IDIOMA
 * 
 * @property Pelicula $pelicula
 * @property Idioma $idioma
 *
 * @package App\Models
 */
class PeliculasIdioma extends Model
{
	protected $table = 'peliculas_idioma';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PELICULA' => 'int',
		'ID_IDIOMA' => 'int'
	];

	public function pelicula()
	{
		return $this->belongsTo(Pelicula::class, 'ID_PELICULA');
	}

	public function idioma()
	{
		return $this->belongsTo(Idioma::class, 'ID_IDIOMA');
	}
}
