<?php

namespace App\Http\Controllers;


use App\Models\Agent;
use App\Models\Grade;
use App\Models\Indemnite;

class Avancement
{

    var $indice;
    var $id_grade;
    var $dateD;
    var $is_omfam;
    var $is_generale;
    var $nbr_famille;
    var $nombre_enfants;
    var $agent;

    var $echellon;
    public function __construct($agent,$dateD=null) {
        $this->agent = $agent;

        if($dateD==null)
        $this->dateD = $agent->date_echellon->format('Y-m-d');
        else
        $this->dateD = $dateD;
        $this->id_grade = $agent->id_grade ;
        $this->indice = $agent->indice ;

        $this->echellon = $agent->echellon ;
        $this->nombre_enfants = $agent->nbr_enfant ;
        $this->is_omfam = $agent->aff_mutuelle == 'OMFAM' ? 1 : 0 ;
        $this->is_generale = $agent->aff_mutuelle == 'GENERALE' ? 1 : 0 ;
        if($agent->situation_fam=='Marié' || ($agent->situation_fam=='Mariée' && $agent->fonction_cj == 'SANS')) {
            $this->nbr_famille = $agent->nbr_enfant + 1;
        }
        else{
            $this->nbr_famille = 0;
        }
    }

    public function getData(){

        $indemnite = Indemnite::where('id_grade', $this->id_grade)->where('indice', $this->indice)->first();

        $data = [
            "indice" => $this->Indice(),
            "Traitement_base" => $this->Traitement_base(),
            "residence" => $this->Indim_residence(),
            "sujection" => $indemnite->sujection ?? 0,
            "administrative" => $indemnite->administrative ?? 0,
            "fonction" => $indemnite->fonction ?? 0,
            "encadrement" => $indemnite->encadrement ?? 0,
            "hierarchique" => $indemnite->hierarchique ?? 0,
            "speciale" => $indemnite->speciale ?? 0,
            "technicite" => $indemnite->technicite ?? 0,
            "charge_famille" => $this->charge_famille(),
            "Base_indemnite_status" => $this->Base_indemnite_status(),
            "Base_imposable_mensuelle" => $this->Base_imposable_mensuelle(),
            "IGR" => $this->IGR(),
            "CMR" => $this->CMR(),
            "OMFAM" => $this->OMFAM(),
            "AOS" => $this->AOS(),
            "AMO" => $this->AMO(),
            "MGPAP" => $this->MGPAP(),
            "CCD" => $this->CCD(),
            "CAAD" => $this->CAAD(),
    ];

    return $data;
    }

    public function total_montant(){
        $total = $this->getData()['Traitement_base'] + $this->getData()['residence']+$this->getData()['sujection']+$this->getData()['administrative']
        +$this->getData()['fonction']+$this->getData()['encadrement']+$this->getData()['hierarchique']
        + $this->getData()['speciale']+$this->getData()['technicite']+$this->getData()['charge_famille'];

        return $total;
    }

    public function total_decompte(){
        $total = $this->getData()['IGR'] + $this->getData()['CMR']+$this->getData()['OMFAM']+$this->getData()['AOS']+$this->getData()['AMO']+$this->getData()['MGPAP']
        +$this->getData()['CCD']+ $this->getData()['CAAD'];

        return $total;
    }

    public function Indice($id_grade = null, $echellon = null)
    {

        $id_grade = $id_grade ?? $this->id_grade;
        $echellon = $echellon ?? $this->echellon;

        $indemnite = Indemnite::where('id_grade', $id_grade)->where('echellon', $echellon)->first();

        return $indemnite->indice;

    }


    public function Traitement_base($indice = null)
{
    $indice = $indice ?? $this->indice; // Set $indice to $this->indice if not provided
    $valeurA = 98.85;
    $valeurB = 79.62;
    $valeurC = 50.92;
    $tbase = 0;
    if ($indice >= 1 && $indice <= 100) {
        $tbase = 100 * $valeurA;
    }
    if ($indice >= 101 && $indice <= 150) {
        $tbase = 100 * $valeurA + 50 * $valeurB;
    }
    if ($indice > 150) {
        $tbase = 100 * $valeurA + 50 * $valeurB + ($indice - 150) * $valeurC;
    }

    return $tbase;
}

public function Indim_residence($indice = null)
{
    $indice = $indice ?? $this->indice; // Set $indice to $this->indice if not provided
    $taux_zone = 0.25;
    $tbase = $this->Traitement_base($indice);

    $indim_res = $tbase * $taux_zone;

    return $indim_res;
}


public function charge_famille($nombre_enfants = null,$dateD = null)
{
    $nombre_enfants = $nombre_enfants ?? $this->nombre_enfants;
    $dateD = $dateD ?? $this->dateD;

     if($dateD < '2019-07-01'){
            $valeurA = 200; //300 DH pour premier 3 enfants
            $valeurB = 36; //100 DH pour les autres
            if($nombre_enfants<=3){
                $charge_fam = $nombre_enfants * $valeurA;
            }
            else{
                $charge_fam = 3 * $valeurA + ($nombre_enfants - 3) * $valeurB;
            }
        }else{
            $valeurA = 300; //300 DH pour premier 3 enfants
            $valeurB = 100; //100 DH pour les autres
            if($nombre_enfants<=3){
                $charge_fam = $nombre_enfants * $valeurA;
            }
            else{
                $charge_fam = 3 * $valeurA + ($nombre_enfants - 3) * $valeurB;
            }
        }

    return $charge_fam * 12;
}

public function Base_indemnite_status($indice = null, $id_grade = null)
{


    $indice = $indice ?? $this->indice;

    $id_grade = $id_grade ?? $this->id_grade;

    $indemnite = Indemnite::where('id_grade', $id_grade)->where('indice', $indice)->first();

    $indim_status = $indemnite->administrative + $indemnite->fonction + $indemnite->encadrement +
                    $indemnite->hierarchique + $indemnite->speciale + $indemnite->sujection + $indemnite->technicite;

    return $indim_status;




}

public function Base_imposable_mensuelle($indice = null, $id_grade = null, $nombre_enfants = null)
{
    $indice = $indice ?? $this->indice;
    $id_grade = $id_grade ?? $this->id_grade;
    $nombre_enfants = $nombre_enfants ?? $this->nombre_enfants;

    $bIM = $this->Traitement_base($indice) + $this->Indim_residence($indice) + $this->Base_indemnite_status($indice, $id_grade) - $this->charge_famille($nombre_enfants);
    return $bIM / 12;
}

public function IGR($indice = null, $id_grade = null, $dateD = null, $is_omfam = null, $is_generale = null, $nbr_famille = null)
{
    $indice = $indice ?? $this->indice;
    $id_grade = $id_grade ?? $this->id_grade;
    $dateD = $dateD ?? $this->dateD;
    $is_omfam = $is_omfam ?? $this->is_omfam;
    $is_generale = $is_generale ?? $this->is_generale;
    $nbr_famille = $nbr_famille ?? $this->nbr_famille;
        $indemnite = Indemnite::where('id_grade', $id_grade)->where('indice', $indice)->first();
        $indim_status = $indemnite->administrative + $indemnite->fonction + $indemnite->encadrement +
                        $indemnite->hierarchique + $indemnite->speciale + $indemnite->sujection + $indemnite->technicite;
        $tbase = $this->Traitement_base($indice);
        $indim_res = $this->Indim_residence($indice);
        $retenu = $this->AMO($indice,$id_grade) + $this->CCD($indice,$is_generale) +
                    $this->MGPAP($indice,$id_grade,$dateD,$is_generale) + $this->OMFAM($indice,$id_grade,$dateD,$is_omfam) +
                    $this->CMR($indice,$id_grade,$dateD) + $this->CAAD($indice,$is_omfam);


        $igr_val = $tbase + $indim_res + $indim_status;
        $val_igr = $igr_val * 0.2 >= 30000 ? 30000 : $igr_val * 0.2;

        $charge_famille = $nbr_famille * 360 > 2160 ? 2160 : $nbr_famille *360;

        $val_test = $igr_val - $val_igr -$retenu;




        if( $val_test/12 > 15000  ){
            $taux = 0.38;
            $red = 2033.33;
        }else if( $val_test/12 > 6666.67  ){
            $taux = 0.34;
            $red = 1433.33;
        }else if( $val_test/12 > 5000  ){
            $taux = 0.3;
            $red = 1166.67;
        }else if( $val_test/12 > 4166.67  ){
            $taux = 0.2;
            $red = 666.67;
        }else if( $val_test/12 > 2500  ){
            $taux = 0.1;
            $red = 250;
        }
        else{
            $taux = 0;
            $red = 0;
        }
          //  dd($igr_val);
        $igr = $val_test/12 * $taux - $red - $charge_famille/12;

        return $igr * 12;


    }

    public function CMR($indice = null, $id_grade = null, $dateD = null)
{
    $indice = $indice ?? $this->indice;
    $id_grade = $id_grade ?? $this->id_grade;
    $dateD = $dateD ?? $this->dateD;

        $indemnite = Indemnite::where('id_grade', $id_grade)->where('indice', $indice)->first();
        $indim_status = $indemnite->administrative + $indemnite->encadrement +
                        $indemnite->hierarchique + $indemnite->speciale + $indemnite->sujection + $indemnite->technicite;
        $taux = 0.14;
        if($dateD <= "2016-08-31"){
            $taux = 0.10;
        }elseif ($dateD <= "2016-12-31") {
            $taux = 0.11;
        }elseif ($dateD <= "2017-12-31") {
            $taux = 0.12;
        }elseif ($dateD <= "2018-12-31") {
            $taux = 0.13;
        }

        $tbase = $this->Traitement_base($indice);

        $cmr = ($tbase * 1.1 + $indim_status)*$taux;

        return $cmr;
    }

    public function OMFAM($indice = null, $id_grade = null, $dateD = null, $is_omfam = null)
{
    $indice = $indice ?? $this->indice;
    $id_grade = $id_grade ?? $this->id_grade;
    $dateD = $dateD ?? $this->dateD;
    $is_omfam = $is_omfam ?? $this->is_omfam;


        if($is_omfam==0){
            return 0;
        }
        $tbase = $this->Traitement_base($indice);
        $indemnite = Indemnite::where('id_grade', $id_grade)->where('indice', $indice)->first();
        $indim_status = $indemnite->administrative + $indemnite->encadrement +
                        $indemnite->hierarchique + $indemnite->speciale + $indemnite->sujection + $indemnite->technicite;
        $omfam = 0;
        if($dateD < "2018-10-22"){
           $omfam = $tbase * 0.018 >= 600 ? 600 : $tbase * 0.018 ;
        }
        else{
            $val_omfam = ($tbase * 1.1 + $indim_status)* 0.015;
            if($val_omfam>960)
                $omfam = 960;
            else if($val_omfam <=240)
                $omfam = 240;
            else
                $omfam = $val_omfam;
        }

        return $omfam;
    }

    public function MGPAP($indice = null, $id_grade = null, $dateD = null, $is_generale = null)
{
    $indice = $indice ?? $this->indice;
    $id_grade = $id_grade ?? $this->id_grade;
    $dateD = $dateD ?? $this->dateD;
    $is_generale = $is_generale ?? $this->is_generale;

        if($is_generale==0){
            return 0;
        }
        $tbase = $this->Traitement_base($indice);
        $indemnite = Indemnite::where('id_grade', $id_grade)->where('indice', $indice)->first();
        $indim_status = $indemnite->administrative + $indemnite->encadrement +
                        $indemnite->hierarchique + $indemnite->speciale + $indemnite->sujection + $indemnite->technicite;
        $mgpap = 0;
        if($dateD <= "2015-01-11"){
           $mgpap_val = $tbase * 0.018 ;
           if($mgpap_val>=600)
                $mgpap = 600;
            else if($mgpap_val <=180)
                $mgpap = 180;
            else
                $mgpap = $mgpap_val;
        }
        else{
            $val_mgpap = ($tbase * 1.1 + $indim_status)* 0.015;
            if($val_mgpap>960)
                $mgpap = 960;
            else if($val_mgpap <=180)
                $mgpap = 180;
            else
                $mgpap = $val_mgpap;
        }

        return $mgpap;
    }

    public function CAAD($indice = null, $is_omfam = null)
{
    $indice = $indice ?? $this->indice;
    $is_omfam = $is_omfam ?? $this->is_omfam;

        if($is_omfam==0){
            return 0;
        }
        $tbase = $this->Traitement_base($indice);
        $indim_res = $this->Indim_residence($indice);

        $taux = 0.0139;
        $caad = 0;

            $val_caad = ($tbase + $indim_res) * $taux;
            if($val_caad>=480)
                $caad = 480;
            else
                $caad = $val_caad;


        return $caad;
    }

    public function CCD($indice = null, $is_generale = null)
{
    $indice = $indice ?? $this->indice;
    $is_generale = $is_generale ?? $this->is_generale;

    if ($is_generale == 0) {
        return 0;
    }
    $tbase = $this->Traitement_base($indice);

    $taux = 0.01;
    $ccd = 0;

    $val_ccd = $tbase * $taux;
    if ($val_ccd >= 180) {
        $ccd = 180;
    } else {
        $ccd = $val_ccd;
    }

    return $ccd;
}

public function AMO($indice = null, $id_grade = null)
{
    $indice = $indice ?? $this->indice;
    $id_grade = $id_grade ?? $this->id_grade;

    $tbase = $this->Traitement_base($indice);
    $indemnite = Indemnite::where('id_grade', $id_grade)->where('indice', $indice)->first();
    $indim_status = $indemnite->administrative + $indemnite->encadrement +
                    $indemnite->hierarchique + $indemnite->speciale + $indemnite->sujection + $indemnite->technicite;
    $amo = 0;

    $val_amo = ($tbase * 1.1 + $indim_status) * 0.025;
    if ($val_amo > 4800) {
        $amo = 4800;
    } else if ($val_amo <= 840) {
        $amo = 840;
    } else {
        $amo = $val_amo;
    }

    return $amo;
}


    public function AOS()
    {
       $aos = 60 * 12;

        return $aos;
    }

    /* public function VIVALIS($indice=$this->echellon)
    {
        $taux_zone = 0.25;
        $tbase = $this->Traitement_base($indice);

        $indim_res = $tbase * $taux_zone;

        return $indim_res;
    } */





}
