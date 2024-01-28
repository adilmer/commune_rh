<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $table = 'commissions';
	protected $primaryKey = 'id_commission ';
	public $timestamps = false;

    protected $casts = [
		'date_commission' => 'datetime',
		'date_arrete' => 'datetime'
	];

	protected $fillable = [
		'annee_commission',
		'date_commission',
        'date_arrete',
        'n_arrete',
        'id_statu'
	];
    public function statugrade()
	{
		return $this->belongsTo(Statugrade::class, 'id_statu');
	}
}
