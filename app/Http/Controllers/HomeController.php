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
       // $listretraites=DB::select(DB::raw('SELECT nom_ar,nom_fr,LAST_DAY(DATE_ADD(date_naiss, INTERVAL 62 YEAR)) as dateret FROM agents WHERE YEAR(LAST_DAY(DATE_ADD(date_naiss, INTERVAL 62 YEAR))) BETWEEN YEAR(CURDATE())  AND YEAR(CURDATE())+1 ORDER by dateret ASC LIMIT 10'));
       $listretraites = DB::table('agents')
       ->select([
           'nom_ar',
           'nom_fr',
           DB::raw('LAST_DAY(DATE_ADD(date_naiss, INTERVAL 62 YEAR)) as dateret')
       ])
       ->whereBetween(DB::raw('YEAR(LAST_DAY(DATE_ADD(date_naiss, INTERVAL 62 YEAR)))'), [DB::raw('YEAR(CURDATE())'), DB::raw('YEAR(CURDATE()) + 1')])
       ->orderBy('dateret', 'ASC')
       ->limit(10)
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
        ->select('type_conge', 'date_debut_conge', 'date_fin_conge', 'nbr_jours', 'remplacant', 'nom_ar')
        ->whereDate('date_debut_conge', '<=', now())
        ->whereDate('date_fin_conge', '>=', now())
        ->get();

        



        return view ('homepage.index',['detachement'=>$detachement,'misedisposition'=>$misedisposition,'integration'=>$integration,'retraites'=>$retraites,'listretraites'=>$listretraites,'listconge'=>$listconge]);

    }



}
