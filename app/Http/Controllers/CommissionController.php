<?php

namespace App\Http\Controllers;
use DB;
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
        //$commissions = Commission::all()
       // $commissions = Commission::groupBy('annee_commission')->get();
        $commissions = Commission::select('annee_commission', \Illuminate\Support\Facades\DB::raw('count(*) as commission_count'))
        ->groupBy('annee_commission')
        ->get();


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
            for ($i=0; $i < 9; $i++) {
                Commission::create([
                    "annee_commission"=>$request->annee_commission,
                        "date_commission"=>$request->date_commission[$i],
                        "date_arrete"=>$request->date_arrete[$i],
                        "n_arrete"=>$request->n_arrete[$i],
                        "id_statu"=>$i+1

                    ]);
            }






            return redirect(route('commission.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $commissions = Commission::where('annee_commission', $request->annee_commission)->get();
        $annee_commissions=$request->annee_commission;
        //dd($annee_commissions);

       return view('pages.commissions.details', compact('commissions','annee_commissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request)
    {
        $commissions = Commission::where('annee_commission', $request->annee_commission)->get();
        $annee_commissions=$request->annee_commission;
       return view('pages.commissions.edit', compact('commissions','annee_commissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        for ($i=0; $i < 9; $i++) {
            /*  $commissions = Commission::where('annee_commission', $request->annee_commission)->get();
            $commissions->update([
                "annee_commission"=>$request->annee_commission,
                "date_commission"=>$request->date_commission[$i],
                "date_arrete"=>$request->date_arrete[$i],
                "n_arrete"=>$request->n_arrete[$i],
                "id_statu"=>$i+1

            ]);
            */

            $anneeCommission = $request->annee_commission;



                Commission::where('annee_commission', $anneeCommission)
                ->where('id_statu', $i+1)
                ->update([


                'date_commission' => $request->date_commission[$i],
                'date_arrete' => $request->date_arrete[$i],
                'n_arrete' => $request->n_arrete[$i],
            ]);

        }



        return redirect(route('commission.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        Commission::where('annee_commission', $request->annee_commission)->delete();

        return redirect(route('commission.index'));
    }
}
