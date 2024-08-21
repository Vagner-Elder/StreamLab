<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Genero
 * 
 * @property int $ID
 * @property string $NOMBRE
 * 
 * @property Collection|Pelicula[] $peliculas
 *
 * @package App\Models
 */
class Genero extends Model
{
	protected $table = 'generos';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'NOMBRE'
	];

	public function peliculas()
	{
		return $this->belongsToMany(Pelicula::class, 'peliculas_genero', 'ID_GENERO', 'ID_PELICULA');
	}
}
