<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Bureau;
use App\Models\Departement;
use App\Models\Document;
use App\Models\Fonction;
use App\Models\Grade;
use App\Models\Position;
use App\Models\Service;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 * Summary of AgentController
 */
class AgentController extends Controller
{
    use UploadTrait;
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
        if ($request->photo!=null){
            $requestData['photo'] = $this->saveAs($request->photo,$request->ppr,"photos_agents");
        }
        Agent::create(
            $requestData);

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
        $agent = Agent::findOrFail($request->id_agent);
        $documents = Document::where('id_agent',$request->id_agent)->get();
        //dd($documents);
        return \view('pages.agents.details',compact('agent','documents'));
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
        $services = Service::all();
        $bureaux = Bureau::all();
        $positions = Position::all();
        $agent = Agent::findOrFail($request->id_agent);

        return \view('pages.agents.edit',compact(['departements','grades','fonctions','agent','services','bureaux','positions']));
    }

    /**
     * Summary of uploadDocuments
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function uploadDocuments(Request $request)
    {
        $requestData = $request->all();
        if ($request->path!=null){
            $requestData['path'] = $this->saveAs($request->path,time(),"documents_agents");
        }
        Document::create(
            $requestData);

        return redirect(route('agent.details',$request->id_agent));
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
      // dd($request->all());
        $agent = Agent::findOrFail($request->id_agent);
        //dd($agent);
        $requestData = $request->all();
        if ($request->photo!=null){
            $requestData['photo'] = $this->saveAs($request->photo,$request->ppr,"photos_agents");
        }

		$agent->update($requestData);

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
        $agent = Agent::findOrFail($request->id_agent);
        $agent->delete();

        return redirect(route('agent.index'));
    }
}
