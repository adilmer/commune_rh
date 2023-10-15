<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bureau
 * 
 * @property int $id_bureau
 * @property string|null $nom_bureau_fr
 * @property string|null $nom_bureau_ar
 * @property int $id_service
 *
 * @package App\Models
 */
class Bureau extends Model
{
	protected $table = 'bureaus';
	protected $primaryKey = 'id_bureau';
	public $timestamps = false;

	protected $casts = [
		'id_service' => 'int'
	];

	protected $fillable = [
		'nom_bureau_fr',
		'nom_bureau_ar',
		'id_service'
	];
}
