<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $id_categorie
 * @property string $nom_categorie_ar
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'categories';
	protected $primaryKey = 'id_categorie';
	public $timestamps = false;

	protected $fillable = [
		'nom_categorie_ar'
	];
}
