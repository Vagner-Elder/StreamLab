<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Formato
 * 
 * @property int $ID
 * @property string $NOMBRE
 * 
 * @property Collection|Pelicula[] $peliculas
 *
 * @package App\Models
 */
class Formato extends Model
{
	protected $table = 'formatos';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'NOMBRE'
	];

	public function peliculas()
	{
		return $this->belongsToMany(Pelicula::class, 'peliculas_formatos', 'ID_FORMATO', 'ID_PELICULA');
	}
}
