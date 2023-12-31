<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Departement
 * 
 * @property int $id_departement
 * @property string|null $nom_departement_fr
 * @property string|null $nom_departement_ar
 *
 * @package App\Models
 */
class Departement extends Model
{
	protected $table = 'departements';
	protected $primaryKey = 'id_departement';
	public $timestamps = false;

	protected $fillable = [
		'nom_departement_fr',
		'nom_departement_ar'
	];
}
