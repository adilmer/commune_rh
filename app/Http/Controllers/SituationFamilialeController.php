<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Conjoint;
use App\Models\Enfant;
use App\Models\Formation;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class SituationFamilialeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $agents = Agent::all();


       return view('pages.situationfamiliales.index',compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $agent = null;
        if($request->id_agent != null ){
            $agent = Agent::findOrFail($request->id_agent)->first();
        }
        $agents = Agent::all();
        return view('pages.situationfamiliales.create',compact('agents','agent'));
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

        Conjoint::create(
            $requestData);

        return redirect(route('situationfamiliale.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {


            $conjoint = Conjoint::where('id_conjoint',$request->id_conjoint)->first();


        return view('pages.situationfamiliales.details',compact('conjoint'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_enfant(Request $request)
    {
        $agent = null;
        $conjoint = null;
        if($request->id_conjoint != null ){
            $conjoint = Conjoint::findOrFail($request->id_conjoint)->first();
            $agent = Agent::findOrFail($conjoint->id_agent)->first();
        }
        $agents = Agent::where('id_position',11)->get();
        $conjoints = Conjoint::all();
        return view('pages.situationfamiliales.create_enfant',compact('agents','conjoints','agent','conjoint'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_enfant(Request $request)
    {
        $requestData = $request->all();

        Enfant::create(
            $requestData);

        return redirect(route('situationfamiliale.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_enfant(Request $request)
    {
        $enfant = Enfant::where('id_enfant',$request->id_enfant)->first();


        return view('pages.situationfamiliales.details_enfant',compact('enfant'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $conjoint = Conjoint::where('id_conjoint',$request->id_conjoint)->first();
        return view('pages.situationfamiliales.edit', compact('conjoint'));
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
        $conjoint = Conjoint::findOrFail($request->id_conjoint);
        $conjoint->update($request->all());
       return redirect()->route('situationfamiliale.index');
    }

    public function edit_enfant(Request $request)
    {
        $enfant = Enfant::where('id_enfant',$request->id_enfant)->first();
        return view('pages.situationfamiliales.edit_enfant', compact('enfant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_enfant(Request $request)
    {

        $enfant = Enfant::where('id_enfant',$request->id_enfant)->first();
        $enfant->update($request->all());
       return redirect()->route('situationfamiliale.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $conjoint = Conjoint::findOrFail($request->id_conjoint);
       // dd($conjoint);
        $conjoint->delete();

        return redirect(route('situationfamiliale.index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_enfant(Request $request)
    {
        $enfant = Enfant::findOrFail($request->id_enfant);

        $enfant->delete();

        return redirect(route('situationfamiliale.index'));
    }
}
