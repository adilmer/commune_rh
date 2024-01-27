<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $listretraites = DB::table('agents')
            ->select([
                'id_agent',
                    'nom_ar',
                    'nom_fr',
                DB::raw("
                    CASE
                        WHEN YEAR(date_naiss) = 1957 THEN LAST_DAY(DATE_ADD(DATE_ADD(date_naiss, INTERVAL 60 YEAR), INTERVAL 6 MONTH))
                        WHEN YEAR(date_naiss) = 1958 THEN LAST_DAY(DATE_ADD(date_naiss, INTERVAL 61 YEAR))
                        WHEN YEAR(date_naiss) = 1959 THEN LAST_DAY(DATE_ADD(DATE_ADD(date_naiss, INTERVAL 61 YEAR), INTERVAL 6 MONTH))
                        WHEN YEAR(date_naiss) = 1960 THEN LAST_DAY(DATE_ADD(date_naiss, INTERVAL 62 YEAR))
                        WHEN YEAR(date_naiss) = 1961 THEN LAST_DAY(DATE_ADD(DATE_ADD(date_naiss, INTERVAL 62 YEAR), INTERVAL 6 MONTH))
                        WHEN YEAR(date_naiss) >= 1962 THEN LAST_DAY(DATE_ADD(date_naiss, INTERVAL 63 YEAR))
                    END as dateret
                ")
            ])
            ->whereBetween(DB::raw('YEAR(LAST_DAY(DATE_ADD(date_naiss, INTERVAL 63 YEAR)))'), [DB::raw('YEAR(CURDATE())'), DB::raw('YEAR(CURDATE()) ')])
            ->where(DB::raw('YEAR(LAST_DAY(DATE_ADD(date_naiss, INTERVAL 63 YEAR)))'), '<=', DB::raw('YEAR(NOW())')) // فقط المتقاعدين في السنة الحالية
            ->orderBy('dateret', 'ASC')
            ->get();

            foreach ($listretraites as $key => $value) {
                if($value->dateret <= date('Y').'-01-01'){
                 unset($listretraites[$key]);
                }
             }
            // dd($listretraites);

       //$detachement= DB::select(DB::raw('SELECT COUNT(*) as n1 FROM `agents` WHERE id_position=2'));
        $detachement = DB::table('agents')
        ->where('id_position', 2)
        ->count();
        //$misedisposition= DB::select(DB::raw('SELECT COUNT(*) as n2 FROM `agents` WHERE id_position=3'));
        $totalagent = DB::table('agents')
       ->where('id_position', 11)
        ->count();

       // $integration= DB::select(DB::raw('SELECT COUNT(*) as n3 FROM `agents` WHERE id_position=4'));
       $integration = DB::table('agents')
       ->where('id_position', 4)
       ->count();


       $stage = DB::table('stagiaires')
        ->select('nom_stagiaire_ar')
        ->whereDate('date_debut_stage', '<=', now())
        ->whereDate('date_fin_stage', '>=', now())
        ->count();



       // $retraites= DB::select(DB::raw('SELECT COUNT(*) as n4 FROM `agents` WHERE id_position=5'));
        $retraites = DB::table('agents')
        ->select([
            'id_agent',
                'nom_ar',
                'nom_fr',
            DB::raw("
                CASE
                    WHEN YEAR(date_naiss) = 1957 THEN LAST_DAY(DATE_ADD(DATE_ADD(date_naiss, INTERVAL 60 YEAR), INTERVAL 6 MONTH))
                    WHEN YEAR(date_naiss) = 1958 THEN LAST_DAY(DATE_ADD(date_naiss, INTERVAL 61 YEAR))
                    WHEN YEAR(date_naiss) = 1959 THEN LAST_DAY(DATE_ADD(DATE_ADD(date_naiss, INTERVAL 61 YEAR), INTERVAL 6 MONTH))
                    WHEN YEAR(date_naiss) = 1960 THEN LAST_DAY(DATE_ADD(date_naiss, INTERVAL 62 YEAR))
                    WHEN YEAR(date_naiss) = 1961 THEN LAST_DAY(DATE_ADD(DATE_ADD(date_naiss, INTERVAL 62 YEAR), INTERVAL 6 MONTH))
                    WHEN YEAR(date_naiss) >= 1962 THEN LAST_DAY(DATE_ADD(date_naiss, INTERVAL 63 YEAR))
                END as dateret
            ")
        ])
        ->whereBetween(DB::raw('YEAR(LAST_DAY(DATE_ADD(date_naiss, INTERVAL 63 YEAR)))'), [DB::raw('YEAR(CURDATE())'), DB::raw('YEAR(CURDATE()) ')])
        ->where(DB::raw('YEAR(LAST_DAY(DATE_ADD(date_naiss, INTERVAL 63 YEAR)))'), '<=', DB::raw('YEAR(NOW())')) // فقط المتقاعدين في السنة الحالية
        ->orderBy('dateret', 'ASC')
        ->get();


        foreach ($retraites as $key => $value) {
           if($value->dateret <= date('Y').'-01-01'){
            unset($retraites[$key]);
           }
        }


        //dd($retraites);


        $listconge = DB::table('conges')
        ->join('agents', 'agents.id_agent', '=', 'conges.id_agent')
        ->select('type_conge', 'date_debut_conge', 'date_prise', 'nbr_jours', 'remplacant', 'nom_ar')
        ->whereDate('date_debut_conge', '<=', now())
        ->whereDate('date_prise', '>=', now())
        ->limit(5)
        ->get();
        $countconge = $listconge->count();




        return view ('homepage.index',['countconge'=>$countconge,'totalagent'=>$totalagent,'countstage'=>$stage,'retraites'=>$retraites->count(),'listretraites'=>$retraites,'listconge'=>$listconge]);

    }

    public function listretraites()
    {

        $listretraites2 = DB::table('agents')
            ->select([
                'id_agent',
                    'nom_ar',
                    'nom_fr',
                DB::raw("
                    CASE
                        WHEN YEAR(date_naiss) = 1957 THEN LAST_DAY(DATE_ADD(DATE_ADD(date_naiss, INTERVAL 60 YEAR), INTERVAL 6 MONTH))
                        WHEN YEAR(date_naiss) = 1958 THEN LAST_DAY(DATE_ADD(date_naiss, INTERVAL 61 YEAR))
                        WHEN YEAR(date_naiss) = 1959 THEN LAST_DAY(DATE_ADD(DATE_ADD(date_naiss, INTERVAL 61 YEAR), INTERVAL 6 MONTH))
                        WHEN YEAR(date_naiss) = 1960 THEN LAST_DAY(DATE_ADD(date_naiss, INTERVAL 62 YEAR))
                        WHEN YEAR(date_naiss) = 1961 THEN LAST_DAY(DATE_ADD(DATE_ADD(date_naiss, INTERVAL 62 YEAR), INTERVAL 6 MONTH))
                        WHEN YEAR(date_naiss) >= 1962 THEN LAST_DAY(DATE_ADD(date_naiss, INTERVAL 63 YEAR))
                    END as dateret
                ")
            ])
            ->whereBetween(DB::raw('YEAR(LAST_DAY(DATE_ADD(date_naiss, INTERVAL 63 YEAR)))'), [DB::raw('YEAR(CURDATE())'), DB::raw('YEAR(CURDATE()) ')])
            ->where(DB::raw('YEAR(LAST_DAY(DATE_ADD(date_naiss, INTERVAL 63 YEAR)))'), '<=', DB::raw('YEAR(NOW())')) // فقط المتقاعدين في السنة الحالية
            ->orderBy('dateret', 'ASC')
            ->get();
           // dd($listretraites);
            foreach ($listretraites2 as $key => $value) {
                if($value->dateret <= date('Y').'-01-01'){
                 unset($listretraites2[$key]);
                }
             }


                // return view ('homepage.listretraites'['listretraites'=>$listretraites]);
        return view('homepage.listretraites',compact(['listretraites2']));

    }

    public function vacances()
    {
        return view('homepage.vacances');
    }



    public function listconge()
    {
       $listconge = DB::table('conges')
        ->join('agents', 'agents.id_agent', '=', 'conges.id_agent')
        ->select('type_conge', 'date_debut_conge', 'date_prise', 'nbr_jours', 'remplacant', 'nom_ar')
        ->whereDate('date_debut_conge', '<=', now())
        ->whereDate('date_prise', '>=', now())
        ->get();


        return view('homepage.listconge',['listconge'=>$listconge]);
    }


    public function listdocument()
    {

        return view('homepage.listdocument');
    }
    public function test()
    {

        return view('homepage.test');
    }
}
