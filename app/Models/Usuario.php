<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * Class Usuario
 * 
 * @property int $ID
 * @property string $NOMBRE
 * @property string $CORREO
 * @property string $CONTRASENA
 *
 * @package App\Models
 */
class Usuario extends Model
{
	use HasFactory; 

	protected $table = 'usuario';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'NOMBRE',
		'CORREO',
		'CONTRASENA'
	];
}
