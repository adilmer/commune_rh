<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Else_;

class AvancementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::all();

        $table_agents = $agents;
        foreach ($agents as $key => $agent) {
            $echellon = $agent->echellon;
            $date_echellon = $agent->date_echellon;
            $date_diff = Carbon::parse($date_echellon)->age;

           // dd($date_echellon,$date_diff);
            $table_echellon = DB::table('table_echellons')->where('echellon',$echellon)->first();
            
            $anciente = $table_echellon->anciente + $date_diff;
            $table_echellon = DB::table('table_echellons')->where('anciente',$anciente)->first();

            if(!$table_echellon)
            $table_agents[$key]["nouveau_echellon"] = 10;
            else
            $table_agents[$key]["nouveau_echellon"] = $table_echellon->echellon;
            $table_agents[$key]["nouveau_date_echellon"] = Carbon::parse($date_echellon)->addYears($date_diff)->format('Y-m-d');



        }
        //dd($table_agents[$key]);
        return view('avancement.index', compact('table_agents'));

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
