<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Agent
 *
 * @property int $id_agent
 * @property int|null $mat
 * @property int|null $ppr
 * @property string|null $cin
 * @property string|null $nom_fr
 * @property string|null $nom_ar
 * @property string|null $sexe
 * @property Carbon|null $date_naiss
 * @property string|null $lieu_naiss
 * @property Carbon|null $date_rec
 * @property Carbon|null $date_tuto
 * @property int|null $id_grade
 * @property Carbon|null $date_grade
 * @property string|null $echelle
 * @property int|null $echellon
 * @property Carbon|null $date_echellon
 * @property int|null $indice
 * @property Carbon|null $date_position
 * @property Carbon|null $date_fonction
 * @property string|null $lieu_position
 * @property int $id_fonction
 * @property int $id_bureau
 * @property int $id_position
 * @property string|null $situation_fam
 * @property string|null $fonction_cj
 * @property int|null $nbr_enfant
 * @property string|null $aos
 * @property string|null $aff_mutuelle
 * @property string|null $immatriculation
 * @property string|null $n_affilation
 * @property string|null $aff_cmr
 * @property string|null $rib
 * @property string|null $agence
 * @property string|null $tel
 * @property string|null $adresse_fr
 * @property string|null $adresse_ar
 * @property string|null $photo
 *
 * @property Grade|null $grade
 * @property Fonction $fonction
 * @property Bureau $bureau
 * @property Position $position
 * @property Collection|Conge[] $conges
 * @property Collection|Document[] $documents
 *
 * @package App\Models
 */
class Agent extends Model
{
	protected $table = 'agents';
	protected $primaryKey = 'id_agent';
	public $timestamps = false;

	protected $casts = [
		'mat' => 'int',
		'ppr' => 'int',
		'date_naiss' => 'datetime',
		'date_rec' => 'datetime',
		'date_tuto' => 'datetime',
		'id_grade' => 'int',
		'date_grade' => 'datetime',
		'echellon' => 'int',
		'date_echellon' => 'datetime',
		'indice' => 'int',
		'date_position' => 'datetime',
		'id_fonction' => 'int',
		'id_bureau' => 'int',
		'id_position' => 'int',
		'nbr_enfant' => 'int'
	];

	protected $fillable = [
		'mat',
		'ppr',
		'cin',
		'nom_fr',
		'nom_ar',
		'sexe',
		'date_naiss',
		'lieu_naiss',
		'date_rec',
		'date_tuto',
		'id_grade',
		'date_grade',
		'echelle',
		'echellon',
		'date_echellon',
		'indice',
		'date_position',
		'date_fonction',
		'lieu_position',
		'id_fonction',
		'id_bureau',
		'id_position',
		'situation_fam',
		'fonction_cj',
		'nbr_enfant',
		'aos',
		'aff_mutuelle',
		'immatriculation',
		'n_affilation',
		'aff_cmr',
		'rib',
		'agence',
		'tel',
		'adresse_fr',
		'adresse_ar',
		'photo',
        'lieu_naiss_ar',
		'rcar'
	];
    public function grade()
	{
		return $this->belongsTo(Grade::class, 'id_grade');
	}

	public function fonction()
	{
		return $this->belongsTo(Fonction::class, 'id_fonction');
	}

	public function bureau()
	{
		return $this->belongsTo(Bureau::class, 'id_bureau');
	}

	public function position()
	{
		return $this->belongsTo(Position::class, 'id_position');
	}

	public function conges()
	{
		return $this->hasMany(Conge::class, 'id_agent');
	}

	public function documents()
	{
		return $this->hasMany(Document::class, 'id_agent');
	}
}
