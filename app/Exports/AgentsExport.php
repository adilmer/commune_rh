<?php

namespace App\Exports;

use App\Models\Agent;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AgentsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Agent::all();
    }

    /* public function map($data): array
    {
        return[
        $data->mat,
		$data->ppr,
		$data->cin,
		$data->nom_fr,
		$data->nom_ar,
		$data->sexe,
		$data->date_naiss,
		$data->lieu_naiss,
		$data->date_rec,
		$data->id_grade,
		$data->date_grade,
		$data->echelle,
		$data->echellon,
		$data->date_echellon,
		$data->indice,
		$data->date_position,
		$data->lieu_position,
		$data->id_fonction,
		$data->id_bureau,
		$data->id_position,
		$data->situation_fam,
		$data->fonction_cj,
		$data->nbr_enfant,
		$data->aos,
		$data->aff_mutuelle,
		$data->immatriculation,
		$data->n_affilation,
		$data->aff_cmr,
		$data->rib,
		$data->agence,
		$data->tel,
		$data->adresse_fr,
		$data->adresse_ar,
		$data->photo
        ];
    } */

    public function headings(): array
    {
        return [
        'mat',
		'ppr',
		'cin',
		'nom_fr',
		'nom_ar',
		'sexe',
		'date_naiss',
		'lieu_naiss',
		'date_rec',
		'id_grade',
		'date_grade',
		'echelle',
		'echellon',
		'date_echellon',
		'indice',
		'date_position',
		'lieu_position',
		'id_fonction',
		'id_bureau',
		'id_position',
		'situation_fam',
		'fonction_cj',
		'nbr_enfant',
		'aos',
		'aff_mutuelle',
		'immatriculation',
		'n_affilation',
		'aff_cmr',
		'rib',
		'agence',
		'tel',
		'adresse_fr',
		'adresse_ar',
		'photo'
        ];
    }
}
