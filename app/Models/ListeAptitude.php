<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ListeAptitude
 *
 * @property int $id_liste_aptitude
 * @property int $id_agent
 * @property int $id_aptitude
 * @property int|null $status_accepte
 * @property int $status_invite
 * @property int $status_ecrit
 * @property int $status_succe
 * @property int|null $note_ecrit
 * @property int|null $note_orale
 * @property int|null $note_final
 *
 * @property Aptitude $aptitude
 *
 * @package App\Models
 */
class ListeAptitude extends Model
{
	protected $table = 'liste_aptitudes';
	protected $primaryKey = 'id_liste_aptitude';
	public $timestamps = false;

	protected $casts = [
		'id_agent' => 'int',
		'id_aptitude' => 'int',
		'status_accepte' => 'int',
		'status_invite' => 'int',
		'status_ecrit' => 'int',
		'status_succe' => 'int',
		'status_comiteExamen' => 'int',
		'status_comiteSurve' => 'int',
		'note_ecrit' => 'int',
		'note_orale' => 'int',
		'note_final' => 'int'
	];

	protected $fillable = [
		'id_agent',
		'id_aptitude',
		'status_accepte',
		'status_invite',
		'status_ecrit',
		'status_succe',
		'status_comiteExamen',
		'status_comiteSurve',
		'note_ecrit',
		'note_orale',
		'note_final'
	];

	public function aptitude()
	{
		return $this->belongsTo(Aptitude::class, 'id_aptitude');
	}

    public function agent()
	{
		return $this->belongsTo(Agent::class, 'id_agent');
	}
}
