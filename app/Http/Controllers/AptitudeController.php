<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Aptitude;
use App\Models\ListeAptitude;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class AptitudeController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aptitudes = Aptitude::orderbyDesc('annee_aptitude')->get();
       return view('pages.aptitudes.index', compact('aptitudes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.aptitudes.create');
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
        Aptitude::create(
            $requestData);

        return redirect(route('aptitude.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $aptitude = Aptitude::findOrFail($request->id_aptitude);
       return view('pages.aptitudes.details', compact('aptitude'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $aptitude = Aptitude::findOrFail($request->id_aptitude);
       return view('pages.aptitudes.edit', compact('aptitude'));
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
        $aptitude = Aptitude::findOrFail($request->id_aptitude);
        $aptitude->update($request->all());
       return redirect()->route('aptitude.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $aptitude = Aptitude::findOrFail($request->id_aptitude);
        File::delete(public_path('documents_aptitudes/' . $aptitude->path_aptitude));
        $aptitude->delete();

        return redirect(route('aptitude.index'));
    }


    public function accepte(Request $request)
    {
        $aptitude = Aptitude::findOrFail($request->id_aptitude);
        $date_acceptation =  $aptitude->dateD_aptitude->format('Y')-6 .'-' . $aptitude->dateD_aptitude->format('m-d');
        $agents = Agent::where('date_grade','<=',$date_acceptation)->get();
        foreach ($agents as $key => $agent) {
            $aptitude = ListeAptitude::where('id_agent',$agent->id_agent)->where('id_aptitude',$request->id_aptitude)->first();
            if(!$aptitude)
            ListeAptitude::create([
                "id_agent"=>$agent->id_agent,
                "id_aptitude"=>$request->id_aptitude
            ]);
        }

        $aptitudes = ListeAptitude::where('id_aptitude',$request->id_aptitude)->where('status_accepte',1)->get();

        $aptitude = ListeAptitude::where('id_aptitude',$request->id_aptitude)->first();
       return view('pages.aptitudes.accepte', compact('aptitudes','aptitude'));
    }

    public function accepte_save(Request $request)
    {
        $aptitude = ListeAptitude::where('id_agent',$request->id_agent)->where('id_aptitude',$request->id_aptitude)->first();
        if(!$aptitude)
        ListeAptitude::create([
            "id_agent"=>$request->id_agent,
            "id_aptitude"=>$request->id_aptitude
        ]);
        else
        $aptitude->update([
            "status_accepte"=>1,
        ]);


       return redirect(route('aptitude.accepte',$request->id_aptitude));
    }

    public function accepte_remove(Request $request)
    {
        $aptitude = ListeAptitude::where('id_liste_aptitude',$request->id_liste_aptitude)->first();
        $aptitude->update([
                "status_accepte"=>0,
            ]);

       return redirect(route('aptitude.accepte',$aptitude->id_aptitude));
    }

    public function ecrit(Request $request)
    {


        $aptitudes = ListeAptitude::where('id_aptitude',$request->id_aptitude)->where('status_invite',1)->get();

        $aptitude = ListeAptitude::where('id_aptitude',$request->id_aptitude)->first();


       return view('pages.aptitudes.ecrit', compact('aptitudes','aptitude'));
    }

    public function ecrit_save(Request $request)
    {
        $aptitude = ListeAptitude::where('id_agent',$request->id_agent)->where('id_aptitude',$request->id_aptitude)->first();
        if(!$aptitude)
        ListeAptitude::create([
            "id_agent"=>$request->id_agent,
            "id_aptitude"=>$request->id_aptitude
        ]);
        else
        $aptitude->update([
            "status_invite"=>1,
        ]);


       return redirect(route('aptitude.ecrit',$request->id_aptitude));
    }

    public function ecrit_saveAll(Request $request)
    {
        $aptitudes = ListeAptitude::where('id_aptitude',$request->id_aptitude)->where('status_accepte',1)->get();


        foreach ($aptitudes as $key => $aptitude) {
            if($aptitude)
            $aptitude->update([
                "status_invite"=>"1",
            ]);
        }

       return redirect(route('aptitude.ecrit',$request->id_aptitude));
    }

    public function ecrit_remove(Request $request)
    {
        $aptitude = ListeAptitude::where('id_liste_aptitude',$request->id_liste_aptitude)->first();
        $aptitude->update([
                "status_invite"=>0,
            ]);

       return redirect(route('aptitude.ecrit',$aptitude->id_aptitude));
    }


    public function orale(Request $request)
    {


        $aptitudes = ListeAptitude::where('id_aptitude',$request->id_aptitude)->where('status_ecrit',1)->where('note_ecrit','>=',10)->get();

        $aptitude = ListeAptitude::where('id_aptitude',$request->id_aptitude)->first();


       return view('pages.aptitudes.orale', compact('aptitudes','aptitude'));
    }

    public function orale_save(Request $request)
    {
        $aptitude = ListeAptitude::where('id_agent',$request->id_agent)->where('id_aptitude',$request->id_aptitude)->first();
        if(!$aptitude)
        ListeAptitude::create([
            "id_agent"=>$request->id_agent,
            "id_aptitude"=>$request->id_aptitude
        ]);
        else
        $aptitude->update([
            "status_ecrit"=>1,
        ]);


       return redirect(route('aptitude.orale',$request->id_aptitude));
    }

    public function orale_saveAll(Request $request)
    {
        $aptitudes = ListeAptitude::where('id_aptitude',$request->id_aptitude)->where('status_invite',1)->get();


        foreach ($aptitudes as $key => $aptitude) {
            if($aptitude)
            $aptitude->update([
                "status_ecrit"=>"1",
            ]);
        }

       return redirect(route('aptitude.orale',$request->id_aptitude));
    }

    public function orale_remove(Request $request)
    {
        $aptitude = ListeAptitude::where('id_liste_aptitude',$request->id_liste_aptitude)->first();
        $aptitude->update([
                "status_ecrit"=>0,
            ]);

       return redirect(route('aptitude.orale',$aptitude->id_aptitude));
    }




    public function comiteExamen(Request $request)
    {
        $aptitude = Aptitude::findOrFail($request->id_aptitude);
        $date_acceptation =  $aptitude->dateD_aptitude->format('Y')-6 .'-' . $aptitude->dateD_aptitude->format('m-d');
        $agents = Agent::where('date_grade','<=',$date_acceptation)->get();
        foreach ($agents as $key => $agent) {
            $aptitude = ListeAptitude::where('id_agent',$agent->id_agent)->where('id_aptitude',$request->id_aptitude)->first();
            if(!$aptitude)
            ListeAptitude::create([
                "id_agent"=>$agent->id_agent,
                "id_aptitude"=>$request->id_aptitude
            ]);
        }

        $aptitudes = ListeAptitude::where('id_aptitude',$request->id_aptitude)->where('status_comiteExamen',1)->get();

        $aptitude = ListeAptitude::where('id_aptitude',$request->id_aptitude)->first();
       return view('pages.aptitudes.comiteExamen', compact('aptitudes','aptitude'));
    }

    public function comiteExamen_save(Request $request)
    {
        $aptitude = ListeAptitude::where('id_agent',$request->id_agent)->where('id_aptitude',$request->id_aptitude)->first();
        if(!$aptitude)
        ListeAptitude::create([
            "id_agent"=>$request->id_agent,
            "id_aptitude"=>$request->id_aptitude
        ]);
        else
        $aptitude->update([
            "status_comiteExamen"=>1,
        ]);


       return redirect(route('aptitude.comiteExamen',$request->id_aptitude));
    }

    public function comiteExamen_remove(Request $request)
    {
        $aptitude = ListeAptitude::where('id_liste_aptitude',$request->id_liste_aptitude)->first();
        $aptitude->update([
                "status_comiteExamen"=>0,
            ]);

       return redirect(route('aptitude.comiteExamen',$aptitude->id_aptitude));
    }


    public function comiteSurve(Request $request)
    {
        $aptitude = Aptitude::findOrFail($request->id_aptitude);
        $date_acceptation =  $aptitude->dateD_aptitude->format('Y')-6 .'-' . $aptitude->dateD_aptitude->format('m-d');
        $agents = Agent::where('date_grade','<=',$date_acceptation)->get();
        foreach ($agents as $key => $agent) {
            $aptitude = ListeAptitude::where('id_agent',$agent->id_agent)->where('id_aptitude',$request->id_aptitude)->first();
            if(!$aptitude)
            ListeAptitude::create([
                "id_agent"=>$agent->id_agent,
                "id_aptitude"=>$request->id_aptitude
            ]);
        }

        $aptitudes = ListeAptitude::where('id_aptitude',$request->id_aptitude)->where('status_comiteSurve',1)->get();

        $aptitude = ListeAptitude::where('id_aptitude',$request->id_aptitude)->first();


        return view('pages.aptitudes.comiteSurve', compact('aptitudes','aptitude'));
    }

    public function comiteSurve_save(Request $request)
    {
        $aptitude = ListeAptitude::where('id_agent',$request->id_agent)->where('id_aptitude',$request->id_aptitude)->first();
        if(!$aptitude)
        ListeAptitude::create([
            "id_agent"=>$request->id_agent,
            "id_aptitude"=>$request->id_aptitude
        ]);
        else
        $aptitude->update([
            "status_comiteSurve"=>1,
        ]);


       return redirect(route('aptitude.comiteSurve',$request->id_aptitude));
    }

    public function comiteSurve_remove(Request $request)
    {
        $aptitude = ListeAptitude::where('id_liste_aptitude',$request->id_liste_aptitude)->first();
        $aptitude->update([
                "status_comiteSurve"=>0,
            ]);

       return redirect(route('aptitude.comiteSurve',$aptitude->id_aptitude));
    }

    public function notationEcrit(Request $request)
    {


        $aptitudes = ListeAptitude::where('id_aptitude',$request->id_aptitude)->where('status_invite',1)->get();

        $aptitude = ListeAptitude::where('id_aptitude',$request->id_aptitude)->first();


       return view('pages.aptitudes.notationEcrit', compact('aptitudes','aptitude'));
    }

    public function notationEcrit_save(Request $request)
    {

        foreach ($request->id_liste_aptitude as $key => $value) {
            $aptitude = ListeAptitude::where('id_liste_aptitude',$request->id_liste_aptitude[$key])->first();
            $aptitude->update([
                    "note_ecrit"=>$request->note_ecrit[$key],
                ]);
        }


       return redirect(route('aptitude.notationEcrit',$aptitude->id_aptitude));
    }




    public function notationOrale(Request $request)
    {


        $aptitudes = ListeAptitude::where('id_aptitude',$request->id_aptitude)->where('status_ecrit',1)->where('note_ecrit','>=',10)->get();

        $aptitude = ListeAptitude::where('id_aptitude',$request->id_aptitude)->first();


       return view('pages.aptitudes.notationOrale', compact('aptitudes','aptitude'));
    }

    public function notationOrale_save(Request $request)
    {

        foreach ($request->id_liste_aptitude as $key => $value) {
            $aptitude = ListeAptitude::where('id_liste_aptitude',$request->id_liste_aptitude[$key])->first();
            $aptitude->update([
                    "note_orale"=>$request->note_orale[$key],
                ]);
        }


       return redirect(route('aptitude.notationOrale',$aptitude->id_aptitude));
    }





}
