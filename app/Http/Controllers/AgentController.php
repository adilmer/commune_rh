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

    public function filter(Request $request)
    {
        //dd($request);
        $agents = Agent::orderby('nom_fr');
        $agents_count = Agent::orderby('nom_fr');

        if ($request->text != '') {

            $agents = $agents
                ->where(function ($query) use ($request) {
                    $query->where('ppr', 'like', '%' . $request->text . '%')
                          ->orWhere('nom_fr', 'like', '%' . $request->text . '%')
                          ->orWhere('prenom_fr', 'like', '%' . $request->text . '%')
                          ->orWhere('date_entree', 'like', '%' . $request->text . '%')
                          ->orWhere('cin', 'like', '%' . $request->text . '%');
                });

            $agents_count = $agents_count
                ->where(function ($query) use ($request) {
            $query->where('ppr', 'like', '%' . $request->text . '%')
                  ->orWhere('nom_fr', 'like', '%' . $request->text . '%')
                  ->orWhere('prenom_fr', 'like', '%' . $request->text . '%')
                  ->orWhere('date_entree', 'like', '%' . $request->text . '%')
                  ->orWhere('cin', 'like', '%' . $request->text . '%');
        });
        }

        $agents = $agents->where('status', "1");
        $agents_count = $agents_count->where('status', "1");
        $agents = $agents->where('id_user', Auth::id())->get();
        $agents_count = $agents_count->where('id_user', Auth::id())->count();
       // dd($agents->first());
        $data = '';

        foreach ($agents as $key => $agent) {
            $poste = Poste::find($agent->id_lieu_now)->nom;
            $poste1 = Poste::find($agent->id_lieu_aff)->nom;
            $data .=
                "<tr>
        <td><a href='" .
                route('agent.details', $agent->id) .
                "'>$agent->ppr</a></td>
        <td class='row-2'>$agent->nom_fr $agent->prenom_fr</td>
        <td class='row-3'>$agent->nom_ar $agent->prenom_ar</td>
        <td class='row-4'>$agent->cin</td>
        <td class='row-5'>{$agent->grade->nom}</td>
        <td class='row-6'>{$agent->specialite->nom}</td>
        <td class='row-7'>$agent->description</td>
        <td class='row-8'>$agent->tel_one</td>
        <td class='row-9'>$agent->date_entree</td>
        <td class='row-10'>$agent->datenaiss</td>
        <td class='row-11'>$poste1</td>
        <td class='row-12'>$poste</td>
        <td class='col-1'><a href='" .
                route('agent.edit', $agent->id) .
                "' class='btn btn-sm btn-outline-primary btn-round'><i class='la la-edit'></i></a>
            <a href='" .
                route('agent.delete', $agent->id) .
                "' onclick='return confirm(`voulez vous supprimer ?`)' class='btn btn-sm btn-outline-danger btn-round'><i class='la la-remove'></i></a>
        </td>
    </tr>";
        }
        //dd($data);
        return Response(['data' => $data, 'count' => $agents_count]);

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
