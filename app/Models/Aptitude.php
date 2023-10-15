<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Aptitude
 *
 * @property int $id_aptitude
 * @property Carbon|null $dateD_aptitude
 * @property Carbon|null $dateF_aptitude
 * @property int|null $annee_aptitude
 * @property string|null $lieu_aptitude
 * @property int|null $nbr_poste
 *
 * @property Collection|ListeAptitude[] $liste_aptitudes
 *
 * @package App\Models
 */
class Aptitude extends Model
{
	protected $table = 'aptitudes';
	protected $primaryKey = 'id_aptitude';
	public $timestamps = false;

	protected $casts = [
		'dateD_aptitude' => 'datetime',
		'dateF_aptitude' => 'datetime',
		'annee_aptitude' => 'int',
		'nbr_poste' => 'int'
	];

	protected $fillable = [
		'dateD_aptitude',
		'dateF_aptitude',
		'annee_aptitude',
		'lieu_aptitude',
		'nbr_poste'
	];

	public function liste_aptitudes()
	{
		return $this->hasMany(ListeAptitude::class, 'id_aptitude');
	}

    


}
