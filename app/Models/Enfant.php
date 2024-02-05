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
 * @property int $id_enfant
 * @property int $id_conjoint
 * @property string|null $nom_enfant
 * @property Carbon|null $date_naiss
 * @property Carbon|null $status_enfant
 *
 * @package App\Models
 */
class Enfant extends Model
{
	protected $table = 'enfants';
	protected $primaryKey = 'id_enfant';
	public $timestamps = false;

	protected $casts = [
		'date_naiss' => 'datetime',
        'id_conjoint' => 'int'
	];

	protected $fillable = [
		'nom_enfant',
		'date_naiss',
		'status_enfant',
        'id_conjoint'
	];

    public function conjoint()
	{
		return $this->belongsTo(Conjoint::class, 'id_conjoint');
	}
}
