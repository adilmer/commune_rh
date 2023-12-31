<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Position
 * 
 * @property int $id_position
 * @property string|null $nom_position_fr
 * @property string|null $nom_position_ar
 *
 * @package App\Models
 */
class Position extends Model
{
	protected $table = 'positions';
	protected $primaryKey = 'id_position';
	public $timestamps = false;

	protected $fillable = [
		'nom_position_fr',
		'nom_position_ar'
	];
}
