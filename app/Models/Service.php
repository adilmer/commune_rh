<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 *
 * @property int $id_service
 * @property string|null $nom_service_fr
 * @property string|null $nom_service_ar
 * @property int $id_departement
 *
 * @package App\Models
 */
class Service extends Model
{
	protected $table = 'services';
	protected $primaryKey = 'id_service';
	public $timestamps = false;

	protected $casts = [
		'id_departement' => 'int'
	];

	protected $fillable = [
		'nom_service_fr',
		'nom_service_ar',
		'id_departement'
	];


    public function departement()
	{
		return $this->belongsTo(Departement::class, 'id_departement');
	}


}
