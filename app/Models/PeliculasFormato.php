<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PeliculasFormato
 * 
 * @property int $ID_PELICULA
 * @property int $ID_FORMATO
 * 
 * @property Pelicula $pelicula
 * @property Formato $formato
 *
 * @package App\Models
 */
class PeliculasFormato extends Model
{
	protected $table = 'peliculas_formatos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PELICULA' => 'int',
		'ID_FORMATO' => 'int'
	];

	public function pelicula()
	{
		return $this->belongsTo(Pelicula::class, 'ID_PELICULA');
	}

	public function formato()
	{
		return $this->belongsTo(Formato::class, 'ID_FORMATO');
	}
}
