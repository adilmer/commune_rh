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
    public function create()
    {
        $agents = Agent::where('id_position',11)->get();
        return view('pages.situationfamiliales.create',compact('agents'));
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
    public function create_enfant()
    {
        $agents = Agent::where('id_position',11)->get();
        $conjoints = Conjoint::all();
        return view('pages.situationfamiliales.create_enfant',compact('agents','conjoints'));
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

        Conjoint::create(
            $requestData);

        return redirect(route('situationfamiliale.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $conjoint = Conjoint::findOrFail($request->id_conjoint);
        return view('pages.situationfamiliale.edit', compact('conjoint'));
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
        $enfant = Enfant::findOrFail($request->id_enfant);
        return view('pages.situationfamiliale.edit_enfant', compact('enfant'));
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
        $enfant = Enfant::findOrFail($request->id_enfant);
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
