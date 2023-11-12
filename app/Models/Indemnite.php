<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Indemnite
 * 
 * @property int $id_indice
 * @property int $indice
 * @property int $id_grade
 * @property int $echellon
 * @property float $fonction
 * @property float $hierarchique
 * @property float $sujection
 * @property float $encadrement
 * @property float $technicite
 * @property float $speciale
 * @property float $administrative
 * 
 * @property Grade $grade
 *
 * @package App\Models
 */
class Indemnite extends Model
{
	protected $table = 'indemnites';
	protected $primaryKey = 'id_indice';
	public $timestamps = false;

	protected $casts = [
		'indice' => 'int',
		'id_grade' => 'int',
		'echellon' => 'int',
		'fonction' => 'float',
		'hierarchique' => 'float',
		'sujection' => 'float',
		'encadrement' => 'float',
		'technicite' => 'float',
		'speciale' => 'float',
		'administrative' => 'float'
	];

	protected $fillable = [
		'indice',
		'id_grade',
		'echellon',
		'fonction',
		'hierarchique',
		'sujection',
		'encadrement',
		'technicite',
		'speciale',
		'administrative'
	];

	public function grade()
	{
		return $this->belongsTo(Grade::class, 'id_grade');
	}
}
