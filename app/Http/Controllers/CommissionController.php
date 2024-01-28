<?php

namespace App\Http\Controllers;
use App\Models\Statugrade;
use App\Models\Commission;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commissions = Commission::all();
        return view('pages.commissions.index',compact('commissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.commissions.create');
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
     * @param  \App\Models\commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function show(commission $commission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function edit(commission $commission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, commission $commission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function destroy(commission $commission)
    {
        //
    }
}
