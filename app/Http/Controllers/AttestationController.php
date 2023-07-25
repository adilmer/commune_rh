<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Traits\ExportTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class AttestationController extends Controller
{
    use ExportTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::all();
        return view('pages.attestations.demande', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $agent = Agent::findOrFail($request->text);

        $agents = $agent->get();

        $data ="
        <table class='table table-striped text-nowrap mb-0 align-middle'>
        <tbody id='table_history'>
          <tr>
            <td colspan='4' class='border-bottom-0'>
            <h5>الإسم الكامل :  <span class='text-bold' id='nom_ag'>$agent->nom_ar</span></h5>
            </td>
          </tr>
          <tr>
            <td colspan='4' class='border-bottom-0'>
            <h5> رقم التأجير  : <span class='text-bold'>$agent->ppr</span></h5>
            </td>
          </tr>
          <tr>
            <td colspan='4' class='border-bottom-0'>
            <h5> الدرجة : <span class='text-bold'>{$agent->grade->nom_grade_ar}</span></h5>
            </td>
          </tr>
          <tr>
            <td colspan='4' class='border-bottom-0'>
            <h5> المكتب : <span class='text-bold'>{$agent->bureau->nom_bureau_ar}</span></h5>
            </td>
          </tr>
          <tr>
            <td colspan='4' class='border-bottom-0'>
            <h5>  المصلحة : <span class='text-bold'>{$agent->bureau->service->nom_service_ar}</span></h5>
            </td>
          </tr>
          <tr>
            <td colspan='4' class='border-bottom-0'>
            <h5>  القسم : <span class='text-bold'>{$agent->bureau->service->departement->nom_departement_ar}</span></h5>
            </td>
          </tr>
        </tbody>
      </table>";
        return Response(['data' => $data]);
    }

    public function find_ordervirement(Request $request)
    {
        $agent = Agent::findOrFail($request->text);

        $agents = $agent->get();

        $data ="
        <tr>
                          <td class='border-bottom-0'>
                            <h6 class='fw-semibold mb-0'>الإسم الكامل  :</h6>
                          </td>
                          <td class='border-bottom-0'>
                            <p class='mb-0 fw-normal'> $agent->nom_ar</p>
                          </td>
                        </tr>
                        <tr>
                          <td class='border-bottom-0'>
                            <h6 class='fw-semibold mb-0'>إسم البنك :</h6>
                          </td>
                          <td class='border-bottom-0'>
                            <p class='mb-0 fw-normal text-uppercase'>$agent->agence</p>
                          </td>
                        </tr>
                        <tr>
                          <td class='border-bottom-0'>
                            <h6 class='fw-semibold mb-0'>  رقم الحساب البنكي  : </h6>
                          </td>
                          <td class='border-bottom-0'>
                            <p class='mb-0 fw-normal'>$agent->rib</p>
                          </td>
                        </tr>";
        return Response(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function export_word(Request $request)
    {
        $agent = Agent::findOrFail($request->id_agent);
        $data =[];
        if($agent){
           // dd($request);
        $data['nomar'] = $agent->nom_ar;
        $data['grade'] = $agent->grade->nom_grade_ar;
        $data['service'] = $agent->bureau->service->nom_service_ar;
        $data['ppr'] = $agent->ppr;
        $data['motif'] = $request->motif;
        $data['c1'] =  '';
        $data['c2'] =  '';
        $data['c3'] = '';
        $data['c4'] =  '';
        foreach($request->attestation as $attestation){
            $data[$attestation] = 'X';
        }

        $data['signature1'] = $request->signature[0] ?? '';
        $data['signature2'] = $request->signature[1] ?? '';


        $filename = $this->exportWord($data,'demande','ﻁﻠﺏ ﻭﺛﻳﻘﺔ ﺇﺩﺍﺭﻳﺔ ');

        return response()->download($filename)->deleteFileAfterSend(true);
        }
        return redirect(route('attestation.export_word'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ordervirement()
    {
        $agents = Agent::all();
        return view('pages.attestations.ordervirement', compact('agents'));
    }


    public function export_word_demandeconge(Request $request)
    {
        $agent = Agent::findOrFail($request->id_agent);
        $data =[];
        if($agent){
           // dd($request);
        $data['nomfr'] = Str::upper($agent->nom_fr);
        $data['agence'] = Str::upper($agent->agence);
        $data['rib'] = $agent->rib;
        $data['ppr'] = $agent->ppr;
        $data['dateNow'] = date('d/m/Y');
        $data['signature1'] = $request->signature[0] ?? '';
        $data['signature2'] = $request->signature[1] ?? '';
        $data['signature3'] = $request->signature[2] ?? '';

        $filename = $this->exportWord($data,'ordervirement','ORDRE DE VIREMENT IRREVOCABLE ');

        return response()->download($filename)->deleteFileAfterSend(true);
        }
        return redirect(route('attestation.export_word_ordervirement'));
    }


    public function decisionretraite()
    {
        $agents = Agent::all();
        return view('pages.attestations.decisionretraite', compact('agents'));
    }

    public function find_decisionretraite(Request $request)
    {
        $agent = Agent::findOrFail($request->text);

        $agents = $agent->get();

        $data =" <p> الإسم الكامل :  <span class='text-bold mx-2  px-1' id='nom_ag'> $agent->nom_ar </span> رقم التأجير  : <span class='text-bold mx-2  px-1'> $agent->ppr </span> رقم التسجيل  : <span class='text-bold mx-2  px-1'> $agent->mat </span></p>";
        return Response(['data' => $data]);
    }
    public function export_word_decisionretraite(Request $request)
    {
        $agent = Agent::findOrFail($request->id_agent);
        $data =[];
        //dd($request);
        $data['nomfr'] = Str::upper($agent->nom_fr);
        $data['agence'] = Str::upper($agent->agence);
        $data['cin'] = Str::upper($agent->cin);
        $data['nomar'] = $agent->nom_ar;
        $data['datenaiss'] = \Carbon\Carbon::parse($agent->date_naiss)->format('Y/m/d');
        $data['lieunaiss'] = $agent->lieu_naiss;
        $data['aff_mutuelle'] = $agent->aff_mutuelle;
        $data['n_affilation'] = $agent->n_affilation;
        $data['aff_cmr'] = $agent->aff_cmr;
        $data['situation'] = $agent->situation_fam;
        $data['dateretrait'] = \Carbon\Carbon::parse($agent->date_position)->format('Y/m/d');
        $data['grade'] = $agent->grade->nom_grade_ar;
        $data['ech'] = $agent->echelle;
        $data['echl'] = $agent->echellon;
        $data['ind'] = $agent->indice;
        $data['daterec'] = \Carbon\Carbon::parse($agent->date_rec->format('Y/m/d'));
        $data['dategrade'] = \Carbon\Carbon::parse($agent->date_grade->format('Y/m/d'));
        $data['rib'] = $agent->rib;
        $data['ppr'] = $agent->ppr;
        $data['nomperear'] = $request->nomperear;
        $data['nommerear'] = $request->nommerear;
        $data['nomperefr'] = Str::upper($request->nomperefr);
        $data['nommerefr'] = Str::upper($request->nommerefr);
        $data['nomfemme'] = $request->nomfemme;
        $data['journaissfemme'] = \Carbon\Carbon::parse($request->naissfemme)->format('d');
        $data['moinnaissfemme'] = \Carbon\Carbon::parse($request->naissfemme)->format('m');
        $data['anneenaissfemme'] = \Carbon\Carbon::parse($request->naissfemme)->format('Y');
        $data['jourmar'] = \Carbon\Carbon::parse($request->date_mar)->format('d');
        $data['moismar'] = \Carbon\Carbon::parse($request->date_mar)->format('m');
        $data['anneermar'] = \Carbon\Carbon::parse($request->date_mar)->format('Y');
        $data['fonct_cj'] = $request->fonct_cj;
        $data['dateNow'] = date('Y/m/d');

        $filename = $this->exportWord($data,'decisionretraite','الوثائق الخاصة بملف التقاعد');

        return response()->download($filename)->deleteFileAfterSend(true);

    }
}
