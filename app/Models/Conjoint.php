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
 * @property int $id_conjoint
 * @property int $id_agent
 * @property string|null $nom_cj
 * @property string|null $cin_cj
 * @property Carbon|null $date_effet
 * @property Carbon|null $status_conjoint
 *
 * @package App\Models
 */
class Conjoint extends Model
{
	protected $table = 'conjoints';
	protected $primaryKey = 'id_conjoint';
	public $timestamps = false;

	protected $casts = [
		'date_effet' => 'datetime',
        'id_agent' => 'int'
	];

	protected $fillable = [
		'nom_cj',
		'cin_cj',
		'date_effet',
		'status_conjoint',
        'id_agent'
	];

    public function agent()
	{
		return $this->belongsTo(Agent::class, 'id_agent');
	}
}
