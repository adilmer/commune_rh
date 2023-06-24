<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Grade
 * 
 * @property int $id_grade
 * @property string|null $nom_grade_fr
 * @property string|null $nom_grade_ar
 * 
 * @property Collection|Agent[] $agents
 *
 * @package App\Models
 */
class Grade extends Model
{
	protected $table = 'grades';
	protected $primaryKey = 'id_grade';
	public $timestamps = false;

	protected $fillable = [
		'nom_grade_fr',
		'nom_grade_ar'
	];

	public function agents()
	{
		return $this->hasMany(Agent::class, 'id_grade');
	}
}
