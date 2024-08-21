<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PeliculasGenero
 * 
 * @property int $ID_PELICULA
 * @property int $ID_GENERO
 * 
 * @property Pelicula $pelicula
 * @property Genero $genero
 *
 * @package App\Models
 */
class PeliculasGenero extends Model
{
	protected $table = 'peliculas_genero';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PELICULA' => 'int',
		'ID_GENERO' => 'int'
	];

	public function pelicula()
	{
		return $this->belongsTo(Pelicula::class, 'ID_PELICULA');
	}

	public function genero()
	{
		return $this->belongsTo(Genero::class, 'ID_GENERO');
	}
}
