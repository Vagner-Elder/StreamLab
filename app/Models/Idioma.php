<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Idioma
 * 
 * @property int $ID
 * @property string $IDIOMA
 * 
 * @property Collection|Pelicula[] $peliculas
 *
 * @package App\Models
 */
class Idioma extends Model
{
	protected $table = 'idiomas';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'IDIOMA'
	];

	public function peliculas()
	{
		return $this->belongsToMany(Pelicula::class, 'peliculas_idioma', 'ID_IDIOMA', 'ID_PELICULA');
	}
}
