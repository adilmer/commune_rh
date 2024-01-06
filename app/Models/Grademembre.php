<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grademembre extends Model
{
    protected $table = 'grademembres';
	protected $primaryKey = 'id_grademember';
	public $timestamps = false;

	protected $fillable = [
		'nomar_grade',
		'nomfr_grade',
		'indeminite'
	];
}

