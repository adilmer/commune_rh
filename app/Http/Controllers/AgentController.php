<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Departement;
use App\Models\Fonction;
use App\Models\Grade;
class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::all();
        return view('pages.agents.index',compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = Departement::all();
        $grades = Grade::all();
        $fonctions = Fonction::all();
        return \view('pages.agents.create',compact(['departements','grades','fonctions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $requestData['photo'] = "fffff";
        dd($requestData);
        Agent::create(
            $request->all());

        return redirect(route('agent.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $departements = Departement::all();
        $grades = Grade::all();
        $fonctions = Fonction::all();
        $agent = Agent::findOrFail($request->id_agent);

        return \view('pages.agents.edit',compact(['departements','grades','fonctions','agent']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $requestData = $request->all();
        $requestData['photo'] = "fffff";
        dd($requestData);

        return redirect(route('agent.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
