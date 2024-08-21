<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Clasificacion
 * 
 * @property int $ID
 * @property string $NOMBRE
 * 
 * @property Collection|Pelicula[] $peliculas
 *
 * @package App\Models
 */
class Clasificacion extends Model
{
	protected $table = 'clasificacion';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'NOMBRE'
	];

	public function peliculas()
	{
		return $this->hasMany(Pelicula::class);
	}
}
