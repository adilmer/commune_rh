<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Conge;
use App\Traits\ExportTrait;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CongeController extends Controller
{
    use UploadTrait;
    use ExportTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conges = Conge::orderbyDesc('date_debut_conge')->get();

       return view('pages.conges.index', compact('conges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        $agents2 = Agent::all();
        return view('pages.conges.create',compact('agents','agents2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request-> id_agent!=''){
            $requestData = $request->all();
            Conge::create(
                $requestData);

            return redirect(route('conge.index'));
        }else{

            return redirect(route('conge.create'));
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $conge = Conge::findOrFail($request->id_conge);
       return view('pages.conges.details', compact('conge'));
    }

    public function filter(Request $request)
    {
        //dd($request->text);
        $conges = Conge::join('agents','agents.id_agent','conges.id_agent');
        //dd($conges->get());
        if ($request->text != '') {

            $conges = $conges
                ->where(function ($query) use ($request) {
                    $query->where('nom_ar', 'like', '%' . $request->text . '%');
                });

        }
       // dd($conges->getQuery());

        $conges = $conges->orderby('statut_conge')->get();
        //dd($conges->first());
        $data = '';

        foreach ($conges as $key => $conges) {
            $show_route = route('conge.details',$conges->id_conge);
            $edit_route = route('conge.edit',$conges->id_conge);
            $delete_route = route('conge.delete',$conges->id_conge);
            $statut_conge = $conges->statut_conge==0 ? '' : 'checked disabled';
            $data .=
            "<tr>
            <td class='border-bottom-0'>
                          <h6 class='fw-semibold mb-0'>{$conges->agent->nom_ar}</h6>
                        </td>
                        <td class='border-bottom-0'>
                          <p class='mb-0 fw-normal'>{$conges->date_debut_conge->format('Y-m-d')}</p>
                        </td>
                        <td class='border-bottom-0'>
                          <p class='mb-0 fw-normal'>{$conges->date_fin_conge->format('Y-m-d')}</p>
                        </td>
                        <td class='border-bottom-0'>
                          <p class='mb-0 fw-normal'>$conges->nbr_jours</p>
                        </td>
                        <td class='border-bottom-0'>
                          <p class='mb-0 fw-normal'>$conges->type_conge</p>
                        </td>
                        <td class='border-bottom-0'>
                          <p class='mb-0 fw-normal'>$conges->annee_conge</p>
                        </td>
                        <td class='border-bottom-0'>
                        <div class='form-check form-switch text-center'>
                        <input class='form-check-input position-absolute' type='checkbox' name='$conges->id_conge' role='switch' id='checkbox_status' $statut_conge >
                    </div>
                        </td>
            <td class='border-bottom-0'>
              <div class='d-flex align-items-center gap-2'>
               <a href='$show_route'><span class='badge bg-primary rounded-3 fw-semibold'><i class='ti ti-eye'></i></span></a>
               <a href='$edit_route'><span class='badge bg-success rounded-3 fw-semibold'><i class='ti ti-edit'></i></span></a>
               <a href='$delete_route' onclick='return confirm(`هل تريد إزالة هذه الرخصة من قاعدة البيانات ؟`)' class='badge bg-danger rounded-3 fw-semibold'><i class='ti ti-trash'></i></a>
            </td>
          </tr>";
        }
        //dd($data);
        return Response(['data' => $data]);

    }

    public function change_statut(Request $request)
    {
        //dd($request->text);
        $conge = Conge::where('id_conge',$request->text);
        $conge->update([
            "statut_conge"=>1
        ]);
        $conges = Conge::join('agents','agents.id_agent','conges.id_agent');
        //dd($conges->get());


       // dd($conges->getQuery());

        $conges = $conges->orderby('statut_conge')->get();
        //dd($conges->first());
        $data = '';

        foreach ($conges as $key => $conges) {
            $show_route = route('conge.details',$conges->id_conge);
            $edit_route = route('conge.edit',$conges->id_conge);
            $delete_route = route('conge.delete',$conges->id_conge);
            $statut_conge = $conges->statut_conge==0 ? '' : 'checked disabled';
            $data .=
            "<tr>
            <td class='border-bottom-0'>
                          <h6 class='fw-semibold mb-0'>{$conges->agent->nom_ar}</h6>
                        </td>
                        <td class='border-bottom-0'>
                          <p class='mb-0 fw-normal'>{$conges->date_debut_conge->format('Y-m-d')}</p>
                        </td>
                        <td class='border-bottom-0'>
                          <p class='mb-0 fw-normal'>{$conges->date_fin_conge->format('Y-m-d')}</p>
                        </td>
                        <td class='border-bottom-0'>
                          <p class='mb-0 fw-normal'>$conges->nbr_jours</p>
                        </td>
                        <td class='border-bottom-0'>
                          <p class='mb-0 fw-normal'>$conges->type_conge</p>
                        </td>
                        <td class='border-bottom-0'>
                          <p class='mb-0 fw-normal'>$conges->annee_conge</p>
                        </td>
                        <td class='border-bottom-0'>
                        <div class='form-check form-switch text-center'>
                        <input class='form-check-input position-absolute' type='checkbox' name='$conges->id_conge' role='switch' id='checkbox_status' $statut_conge >
                    </div>
                        </td>
            <td class='border-bottom-0'>
              <div class='d-flex align-items-center gap-2'>
               <a href='$show_route'><span class='badge bg-primary rounded-3 fw-semibold'><i class='ti ti-eye'></i></span></a>
               <a href='$edit_route'><span class='badge bg-success rounded-3 fw-semibold'><i class='ti ti-edit'></i></span></a>
               <a href='$delete_route' onclick='return confirm(`هل تريد إزالة هذه الرخصة من قاعدة البيانات ؟`)' class='badge bg-danger rounded-3 fw-semibold'><i class='ti ti-trash'></i></a>
            </td>
          </tr>";
        }
        //dd($data);
        return Response(['data' => $data]);

    }

    public function filterHistory(Request $request)
    {
        //dd($request->text);
        $conges = Conge::orderby('date_debut_conge');
        //dd($conges->get());
        if ($request->text != '') {

            $conges = $conges
                ->where(function ($query) use ($request) {
                    $query->where('id_agent', '=', $request->text);
                });

        }
       // dd($conges->getQuery());

        $conges = $conges->where('statut_conge',1)->get();
        //dd($conges->first());
        $data = '';

        foreach ($conges as $key => $conges) {

            $data .=
            "<tr>
            <td class='border-bottom-0'>
            <p class='mb-0 fw-normal'>{$conges->date_debut_conge->format('Y-m-d')}</p>
          </td>
          <td class='border-bottom-0'>
            <p class='mb-0 fw-normal'>{$conges->nbr_jours}</p>
          </td>
          <td class='border-bottom-0'>
            <p class='mb-0 fw-normal'>{$conges->type_conge}</p>
          </td>
          <td class='border-bottom-0'>
            <p class='mb-0 fw-normal'>{$conges->annee_conge}</p>
          </td></tr> ";
        }

        if ($conges->count()==0){
            $data = "<tr><td colspan='4' class='border-bottom-0'>
            <p class='mb-0 fw-normal '>المعني بالأمر لم يستفد من أي رخصة</p>
          </td></tr>";
        }
        if ($request->text == ''){
            $data = "<tr><td colspan='4' class='border-bottom-0'>
            <p class='mb-0 fw-normal '>المرجو اختيار الموظف من لائحة الموظفين لمشاهدة أرشيف رخصه</p>
          </td></tr>";
        }
        //dd($data);
        return Response(['data' => $data]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $conge = Conge::findOrFail($request->id_conge);
        $conges = Conge::where('id_agent', $conge->id_agent)->orderby('date_debut_conge')->get();
        $agents2 = Agent::all();
       return view('pages.conges.edit', compact('conge','conges','agents2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $conge = Conge::findOrFail($request->id_conge);
        $conge->update($request->all());
       return redirect()->route('conge.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $conge = Conge::findOrFail($request->id_conge);
        $conge->delete();

        return redirect(route('conge.index'));
    }

    public function export_word_demandeConge(Request $request)
    {
        //dd($request);
        $conge = Conge::findOrFail($request->id_conge);
        $agent = Agent::findOrFail($conge->id_agent);
        $data =[];

           $data['nomar'] = $agent->nom_ar;
           $data['echelle'] = $agent->echelle;
           $data['echellon'] = $agent->echellon;
           $data['grade'] = $agent->grade->nom_grade_ar;
           $data['service'] = $agent->bureau->service->nom_service_ar;
           $data['ppr'] = $agent->ppr;
           $data['type'] = $conge->type_conge;
           $data['annee'] = $conge->annee_conge;
           $jours = $conge->nbr_jours<=10 ? 'أيام ' : 'يوم ';
           $data['jours'] = $jours ;
           $data['nbrjour'] = $conge->nbr_jours;
           $data['datedebut'] = $conge->date_debut_conge->format('Y/m/d');
           $data['datefin'] = $conge->date_fin_conge->format('Y/m/d');
           $data['dateprise'] = $conge->date_prise->format('Y/m/d');
           $data['lieuconge'] = $conge->adresse_conge;
           $data['remplacant'] = $conge->remplacant;
           $data['dateNow'] = date('Y/m/d');
           $data['signature1'] = $request->signature[0] ?? '';
           $data['signature2'] = $request->signature[1] ?? '';
           $data['signature3'] = $request->signature[2] ?? '';
            if($request->type=='conge')
            $name ='قرار الرخصة';
            if($request->type=='demandeconge')
            $name ='ﻁﻠﺏ ﺭﺧــﺻﺔ';
            if($request->type=='congematernite')
            $name ='قرار رخصة الولادة';
            if($request->type=='congepaternite')
            $name ='قرار رخصة الأبوة';

        $filename = $this->exportWord($data,$request->type,$name);

        return response()->download($filename)->deleteFileAfterSend(true);

    }



}
