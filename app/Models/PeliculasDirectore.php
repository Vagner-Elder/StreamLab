<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PeliculasDirectore
 * 
 * @property int $ID_PELICULA
 * @property int $ID_DIRECTOR
 * 
 * @property Pelicula $pelicula
 * @property Directore $directore
 *
 * @package App\Models
 */
class PeliculasDirectore extends Model
{
	protected $table = 'peliculas_directores';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PELICULA' => 'int',
		'ID_DIRECTOR' => 'int'
	];

	public function pelicula()
	{
		return $this->belongsTo(Pelicula::class, 'ID_PELICULA');
	}

	public function directore()
	{
		return $this->belongsTo(Directore::class, 'ID_DIRECTOR');
	}
}
