<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $id_categorie
 * @property string|null $nom_categorie_ar
 * 
 * @property Collection|Archive[] $archives
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

	public function archives()
	{
		return $this->hasMany(Archive::class, 'id_categorie');
	}
}
