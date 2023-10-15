<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Notation
 * 
 * @property int $id_notation
 * @property int $id_agent
 * @property int|null $annee_notation
 * @property int|null $note
 *
 * @package App\Models
 */
class Notation extends Model
{
	protected $table = 'notations';
	protected $primaryKey = 'id_notation';
	public $timestamps = false;

	protected $casts = [
		'id_agent' => 'int',
		'annee_notation' => 'int',
		'note' => 'int'
	];

	protected $fillable = [
		'id_agent',
		'annee_notation',
		'note'
	];
}
