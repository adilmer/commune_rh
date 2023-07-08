<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Formation
 * 
 * @property int $id_formation
 * @property string|null $nom_formation_ar
 * @property Carbon|null $date_formation
 * @property string|null $participantes
 * @property string|null $path_formation
 *
 * @package App\Models
 */
class Formation extends Model
{
	protected $table = 'formations';
	protected $primaryKey = 'id_formation';
	public $timestamps = false;

	protected $casts = [
		'date_formation' => 'datetime'
	];

	protected $fillable = [
		'nom_formation_ar',
		'date_formation',
		'participantes',
		'path_formation'
	];
}
