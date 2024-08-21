<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PeliculasActore
 * 
 * @property int $ID_PELICULA
 * @property int $ID_ACTOR
 * 
 * @property Pelicula $pelicula
 * @property Actore $actore
 *
 * @package App\Models
 */
class PeliculasActore extends Model
{
	protected $table = 'peliculas_actores';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PELICULA' => 'int',
		'ID_ACTOR' => 'int'
	];

	public function pelicula()
	{
		return $this->belongsTo(Pelicula::class, 'ID_PELICULA');
	}

	public function actore()
	{
		return $this->belongsTo(Actore::class, 'ID_ACTOR');
	}
}
