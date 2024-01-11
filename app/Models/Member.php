<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
	protected $primaryKey = 'id_member';
	public $timestamps = false;

    protected $casts = [
		'date_naiss'=>'datetime',
		'status_member'=>'int'

	];

	protected $fillable = [
		'nomar_member',
		'nomfr_member',
		'cin',
		'date_naiss',
		'banque',
		'rib',
		'id_grademember',
		'status_member'
	];
    public function grademember()
	{
		return $this->belongsTo(Grademembre::class, 'id_grademember');
	}
   
}
