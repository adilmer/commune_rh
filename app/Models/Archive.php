<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Archive
 * 
 * @property int $id_archive
 * @property string $nom_archive_ar
 * @property int|null $id_categorie
 * @property Carbon|null $date_archive
 * @property string|null $path_archive
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Category|null $category
 *
 * @package App\Models
 */
class Archive extends Model
{
	protected $table = 'archives';
	protected $primaryKey = 'id_archive';

	protected $casts = [
		'id_categorie' => 'int',
		'date_archive' => 'datetime'
	];

	protected $fillable = [
		'nom_archive_ar',
		'id_categorie',
		'date_archive',
		'path_archive'
	];

	public function category()
	{
		return $this->belongsTo(Category::class, 'id_categorie');
	}
}
