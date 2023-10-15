<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Document
 * 
 * @property int $id_document
 * @property string|null $titre
 * @property string|null $path
 * @property int $id_agent
 *
 * @package App\Models
 */
class Document extends Model
{
	protected $table = 'documents';
	protected $primaryKey = 'id_document';
	public $timestamps = false;

	protected $casts = [
		'id_agent' => 'int'
	];

	protected $fillable = [
		'titre',
		'path',
		'id_agent'
	];
}
