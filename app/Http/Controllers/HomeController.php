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
        $listretraites=DB::select(DB::raw('SELECT nom_ar,nom_fr,LAST_DAY(DATE_ADD(date_naiss, INTERVAL 62 YEAR)) as dateret FROM agents WHERE YEAR(LAST_DAY(DATE_ADD(date_naiss, INTERVAL 62 YEAR))) BETWEEN YEAR(CURDATE())  AND YEAR(CURDATE())+2 ORDER by dateret ASC'));  
        $detachement= DB::select(DB::raw('SELECT COUNT(*) as n1 FROM `agents` WHERE id_position=2'));  
        $misedisposition= DB::select(DB::raw('SELECT COUNT(*) as n2 FROM `agents` WHERE id_position=3'));  
        $integration= DB::select(DB::raw('SELECT COUNT(*) as n3 FROM `agents` WHERE id_position=4'));  
        $retraites= DB::select(DB::raw('SELECT COUNT(*) as n4 FROM `agents` WHERE id_position=5'));  

       // dd($listretraites);

        return view ('homepage.index',['detachement'=>$detachement,'misedisposition'=>$misedisposition,'integration'=>$integration,'retraites'=>$retraites,'listretraites'=>$listretraites]);




      //  return view('homepage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }
}
