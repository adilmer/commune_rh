<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statugrade extends Model
{
    protected $table = 'statugrade';
	protected $primaryKey = 'id_statu';
	public $timestamps = false;



	protected $fillable = [
		'nom_statu_ar',
		'nom_statu_ar'
	];
}
