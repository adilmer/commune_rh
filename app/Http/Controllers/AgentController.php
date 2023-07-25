<?php

namespace App\Http\Controllers;

use App\Exports\AgentsExport;
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
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

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
        $positions = Position::all();

        return view('pages.agents.index',compact('agents','positions'));
    }

    public function export(Request $request)
{
   // dd($request->names);
$names = $request->names;
$names1 = [];
$names2 = [];

foreach ($names as $value) {
    $splitValues = explode(' as ', $value);

    $names1[] =
        trim($splitValues[0]);
   // dd($names1);
    $names2[] =
        trim($splitValues[1]);
}
   session()->put('column_agents', $names1);
   session()->put('header_agents', $names2);

   return Excel::download(new AgentsExport, 'agents.xlsx');
}

    public function filter(Request $request)
    {
        //dd($request);
        $agents = Agent::orderby('mat');

        if ($request->text != '') {

            $agents = $agents
                ->where(function ($query) use ($request) {
                    $query->where('ppr', 'like', '%' . $request->text . '%')
                          ->orWhere('nom_fr', 'like', '%' . $request->text . '%')
                          ->orWhere('nom_ar', 'like', '%' . $request->text . '%')
                          ->orWhere('mat', 'like', '%' . $request->text . '%')
                          ->orWhere('cin', 'like', '%' . $request->text . '%');
                });
        }


        $agents = $agents->get();
       // dd($agents->first());
        $data = '';

        foreach ($agents as $key => $agents) {
            $nom_service_ar = $agents->bureau->service->nom_service_ar;
            $nom_position_ar = $agents->position->nom_position_ar;
            $nom_grade_ar = $agents->grade->nom_grade_ar;
            $photo_url=asset('photos_agents/'.$agents->photo);
            $date_position = \Carbon\Carbon::parse($agents->date_position)->format('Y-m-d');
            $data .=
            "<tr>
            <td class='border-bottom-0'>
              <div class='img' >";
                  if ($agents->photo!=null)
                  $data .="<img class='rounded-circle ' width='50px' height='50px'  onerror='this.onerror=null; this.src=`../assets/images/profile/user-1.jpg`'  src='$photo_url' alt='' srcset=''>";
                  else
                  $data .="<img class='rounded-circle' width='50px' height='50px' src='../assets/images/profile/user-1.jpg' alt='' srcset=''>";

            $data .="</div>
            </td>
            <td class='border-bottom-0'>
              <h6 class='fw-semibold mb-0'>$agents->mat</h6>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$agents->ppr</p>
            </td>
            <td class='border-bottom-0'>
                <h6 class='fw-semibold mb-1'>$agents->nom_ar</h6>
                <span class='fw-normal'>$agents->nom_fr</span>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$nom_grade_ar</p>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$agents->echelle</p>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$agents->echellon</p>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$nom_service_ar</p>
            </td>";

            $data .= "<td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$nom_position_ar</p>
            </td>
            <td class='border-bottom-0  col-sm-1'>
              <p class='mb-0 fw-normal'>$date_position</p>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$agents->lieu_position</p>
            </td>";
            $route_details = route('agent.details',$agents->id_agent);
            $route_edit = route('agent.edit',$agents->id_agent);
            $route_delete = route('agent.delete',$agents->id_agent);
            $data .="<td class='border-bottom-0'>
              <div class='d-flex  align-items-center gap-2'>
                <a href='$route_details' class='badge bg-primary rounded-3 fw-semibold'><i class='ti ti-eye'></i></a>
                <a href='$route_edit' class='badge bg-success rounded-3 fw-semibold'><i class='ti ti-edit'></i></a>
                <a href='$route_delete' onclick='return confirm(`هل تريد إزالة هذا الموظف من قاعدة البيانات ؟`)' class='badge bg-danger rounded-3 fw-semibold'><i class='ti ti-trash'></i></a>
              </div>
            </td>
          </tr>";
        }
        //dd($data);
        return Response(['data' => $data]);

    }

    public function filterByPosition(Request $request)
    {
        //dd($request);
        $agents = Agent::orderby('mat');

        if ($request->text != '0') {

            $agents = $agents
                ->where('id_position', $request->text);
        }


        $agents = $agents->get();
       // dd($agents->first());
        $data = '';

        foreach ($agents as $key => $agents) {
            $nom_service_ar = $agents->bureau->service->nom_service_ar;
            $nom_position_ar = $agents->position->nom_position_ar;
            $nom_grade_ar = $agents->grade->nom_grade_ar;
            $photo_url=asset('photos_agents/'.$agents->photo);
            $date_position = \Carbon\Carbon::parse($agents->date_position)->format('Y-m-d');
            $data .=
            "<tr>
            <td class='border-bottom-0'>
              <div class='img' >";
                  if ($agents->photo!=null)
                  $data .="<img class='rounded-circle ' width='50px' height='50px'   onerror='this.onerror=null; this.src=`../assets/images/profile/user-1.jpg`'  src='$photo_url' alt='' srcset=''>";
                  else
                  $data .="<img class='rounded-circle' width='50px' height='50px' src='../assets/images/profile/user-1.jpg' alt='' srcset=''>";

            $data .="</div>
            </td>
            <td class='border-bottom-0'>
              <h6 class='fw-semibold mb-0'>$agents->mat</h6>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$agents->ppr</p>
            </td>
            <td class='border-bottom-0'>
                <h6 class='fw-semibold mb-1'>$agents->nom_ar</h6>
                <span class='fw-normal'>$agents->nom_fr</span>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$nom_grade_ar</p>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$agents->echelle</p>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$agents->echellon</p>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$nom_service_ar</p>
            </td>
           <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$nom_position_ar</p>
            </td>";


            $data .= "<td class='border-bottom-0 pos col-sm-1'>
              <p class='mb-0 fw-normal'>$date_position</p>
            </td>
            <td class='border-bottom-0 pos'>
              <p class='mb-0 fw-normal'>$agents->lieu_position</p>
            </td>";
            $route_details = route('agent.details',$agents->id_agent);
            $route_edit = route('agent.edit',$agents->id_agent);
            $route_delete = route('agent.delete',$agents->id_agent);
            $data .="<td class='border-bottom-0'>
              <div class='d-flex  align-items-center gap-2'>
                <a href='$route_details' class='badge bg-primary rounded-3 fw-semibold'><i class='ti ti-eye'></i></a>
                <a href='$route_edit' class='badge bg-success rounded-3 fw-semibold'><i class='ti ti-edit'></i></a>
                <a href='$route_delete' onclick='return confirm(`هل تريد إزالة هذا الموظف من قاعدة البيانات ؟`)' class='badge bg-danger rounded-3 fw-semibold'><i class='ti ti-trash'></i></a>
              </div>
            </td>
          </tr>";
        }
        //dd($data);
        return Response(['data' => $data]);

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
        $documents = Document::where('id_agent',$request->id_agent)->get();
        File::delete(public_path('photos_agents/' . $agent->photo));
        foreach($documents as $documents)
        File::delete(public_path('documents_agents/' . $documents->path));

        $agent->delete();

        return redirect(route('agent.index'));
    }
}
