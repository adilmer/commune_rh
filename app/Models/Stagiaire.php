<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Stagiaire
 * 
 * @property int $id_stagiaire
 * @property string|null $nom_stagiaire_ar
 * @property string|null $nom_stagiaire_fr
 * @property Carbon|null $date_debut_stage
 * @property Carbon|null $date_fin_stage
 * @property string|null $direction_stagiaire
 * @property string|null $filiere_stagiaire
 * @property string|null $path_stage
 *
 * @package App\Models
 */
class Stagiaire extends Model
{
	protected $table = 'stagiaires';
	protected $primaryKey = 'id_stagiaire';
	public $timestamps = false;

	protected $casts = [
		'date_debut_stage' => 'datetime',
		'date_fin_stage' => 'datetime'
	];

	protected $fillable = [
		'nom_stagiaire_ar',
		'nom_stagiaire_fr',
		'date_debut_stage',
		'date_fin_stage',
		'direction_stagiaire',
		'filiere_stagiaire',
		'path_stage'
	];
}
