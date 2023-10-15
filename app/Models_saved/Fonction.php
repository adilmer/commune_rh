<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fonction
 * 
 * @property int $id_fonction
 * @property string|null $nom_fonction_fr
 * @property string|null $nom_fonction_ar
 *
 * @package App\Models
 */
class Fonction extends Model
{
	protected $table = 'fonctions';
	protected $primaryKey = 'id_fonction';
	public $timestamps = false;

	protected $fillable = [
		'nom_fonction_fr',
		'nom_fonction_ar'
	];
}
