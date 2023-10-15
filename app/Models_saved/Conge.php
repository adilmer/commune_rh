<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Conge
 * 
 * @property int $id_conge
 * @property string|null $type_conge
 * @property Carbon|null $date_debut_conge
 * @property Carbon|null $date_fin_conge
 * @property int $nbr_jours
 * @property int $annee_conge
 * @property int|null $id_agent
 * @property string|null $remplacant
 * @property string|null $adresse_conge
 * @property Carbon|null $date_prise
 * @property int $statut_conge
 *
 * @package App\Models
 */
class Conge extends Model
{
	protected $table = 'conges';
	protected $primaryKey = 'id_conge';
	public $timestamps = false;

	protected $casts = [
		'date_debut_conge' => 'datetime',
		'date_fin_conge' => 'datetime',
		'nbr_jours' => 'int',
		'annee_conge' => 'int',
		'id_agent' => 'int',
		'date_prise' => 'datetime',
		'statut_conge' => 'int'
	];

	protected $fillable = [
		'type_conge',
		'date_debut_conge',
		'date_fin_conge',
		'nbr_jours',
		'annee_conge',
		'id_agent',
		'remplacant',
		'adresse_conge',
		'date_prise',
		'statut_conge'
	];
}
