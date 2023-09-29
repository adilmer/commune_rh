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
            ->whereBetween(DB::raw('YEAR(LAST_DAY(DATE_ADD(date_naiss, INTERVAL 62 YEAR)))'), [DB::raw('YEAR(CURDATE())'), DB::raw('YEAR(CURDATE()) + 1')])
            ->orderBy('dateret', 'ASC')
            ->limit(5)
            ->get();



       //$detachement= DB::select(DB::raw('SELECT COUNT(*) as n1 FROM `agents` WHERE id_position=2'));
        $detachement = DB::table('agents')
        ->where('id_position', 2)
        ->count();
        //$misedisposition= DB::select(DB::raw('SELECT COUNT(*) as n2 FROM `agents` WHERE id_position=3'));
        $misedisposition = DB::table('agents')
        ->where('id_position', 3)
        ->count();

       // $integration= DB::select(DB::raw('SELECT COUNT(*) as n3 FROM `agents` WHERE id_position=4'));
       $integration = DB::table('agents')
       ->where('id_position', 4)
       ->count();


       // $retraites= DB::select(DB::raw('SELECT COUNT(*) as n4 FROM `agents` WHERE id_position=5'));
        $retraites = DB::table('agents')
        ->where('id_position', 5)
        ->count();


        $listconge = DB::table('conges')
        ->join('agents', 'agents.id_agent', '=', 'conges.id_agent')
        ->select('type_conge', 'date_debut_conge', 'date_prise', 'nbr_jours', 'remplacant', 'nom_ar')
        ->whereDate('date_debut_conge', '<=', now())
        ->whereDate('date_prise', '>=', now())
        ->limit(5)
        ->get();





        return view ('homepage.index',['detachement'=>$detachement,'misedisposition'=>$misedisposition,'integration'=>$integration,'retraites'=>$retraites,'listretraites'=>$listretraites,'listconge'=>$listconge]);

    }

    public function listretraites()
    {

        $listretraites2 = DB::table('agents')
        ->select([
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
        ->whereBetween(DB::raw('YEAR(LAST_DAY(DATE_ADD(date_naiss, INTERVAL 62 YEAR)))'), [DB::raw('YEAR(CURDATE())'), DB::raw('YEAR(CURDATE()) + 1')])
        ->orderBy('dateret', 'ASC')
        ->get();


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
