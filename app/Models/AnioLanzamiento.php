<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AnioLanzamiento
 * 
 * @property int $ID
 * @property int $ANIO
 * 
 * @property Collection|Pelicula[] $peliculas
 *
 * @package App\Models
 */
class AnioLanzamiento extends Model
{
	protected $table = 'anio_lanzamiento';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'ANIO' => 'int'
	];

	protected $fillable = [
		'ANIO'
	];

	public function peliculas()
	{
		return $this->hasMany(Pelicula::class);
	}
}
