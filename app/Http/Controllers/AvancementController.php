<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Indemnite;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Else_;

class AvancementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        $agent = Agent::findOrFail(199);
        $new_echellon = $agent->echellon + 1;
        $new_grade = null ;

        $Nagents =$this->newAgent($agent,$new_grade,2);



        $agent =$this->newAgent($agent,$new_grade,1);
        $Nagent =$this->newAgent($agent,$new_grade,2);
        $avancement = new Avancement($agent,$Nagents->date_echellon->format('Y-m-d'));


        $Navancement = new Avancement($Nagent,$Nagent->date_echellon->format('Y-m-d'));

        //dd($agent,$new_agent,$new_echellon);

        return view('avancement.index', compact('avancement','Navancement','agent','Nagent'));

    }

    public function newAgent($agent,$new_grade=null,$new_echellon=null){
        if($new_echellon==null){
            $new_echellon = $agent->echellon;
            $new_date_echellon = $agent->date_echellon;
        }
        if($new_grade==null){
            $new_grade = $agent->id_grade;
        }
        $new_agent = Agent::where('id_agent',$agent->id_agent)->first();
        $new_agent->echellon = $new_echellon;
        $new_agent->id_grade = $new_grade;
        $table_echellon = DB::table('table_echellons')->where('echellon',$new_echellon)->first();
        $anciente = $table_echellon->anciente;
        $new_agent->date_echellon = $new_agent->date_echellon->addYear($anciente)->format('Y-m-d');;

        $avancement = new Avancement($new_agent);

        $new_agent->indice = $avancement->Indice($new_grade,$new_echellon);

        return $new_agent;
    }

    public function index(Request $request)
    {
        $agents = Agent::all();

        $table_agents = null;
        $total = 0;
        $totalBrut = 0;
        $totalAmo = 0;
        $totalCmr = 0;
        $total_montant = null;
      //  session()->put(date('Y'), ["fff"=>123,"ccc"=>456]);
       //dd(session()->has(date('Y')));

      //  if(!session()->has(date('Y'))){
       foreach ($agents as $key => $agent) {

            $table_agents[$key] = $this->get_Montant($this->next_echellon($agent));
                if(isset($table_agents[$key][count($table_agents[$key])-2]->montant["Brut"])){
            $totalBrut = $totalBrut + $table_agents[$key][count($table_agents[$key])-2]->montant["total_brut"];
            $totalCmr = $totalCmr + $table_agents[$key][count($table_agents[$key])-2]->montant["total_cmr"];
            $totalAmo = $totalAmo + $table_agents[$key][count($table_agents[$key])-2]->montant["total_amo"];
            $total = $total + $table_agents[$key][count($table_agents[$key])-2]->montant["total"];
            $total_montant = ["total_brut"=>$totalBrut,"total_cmr"=>$totalCmr,"total_amo"=>$totalAmo,"total"=>$total];


           // dd( $table_agents[$key]);
        }




        }

       // dd( session(date('Y'))[0]);
    /* }
    else{
        $session = session(date('Y'))[0];
        $total_montant = $session['total_montant'] ;
        $table_agents = $session['table_agents'];
    }
 */
    //dd( session(date('Y')));

     // dd($table_agents[1][count($table_agents[0])-2]->montant["Brut"],$table_agents[1]);
    //dd($total_montant["total"]);
        return view('avancement.index2', compact('table_agents','total_montant'));

    }

    public function next_echellon($agent){
        try {


        $Nagent = Agent::where('id_agent',$agent->id_agent)->first();
        $key=0;
        $echellon = $agent->echellon;
        $indice = $agent->indice;
        $date_echellon = $agent->date_echellon;
        $date_diff = Carbon::parse($date_echellon)->age;
        $history_echellon = null;
        $history_echellon[$key] = $agent;

        while (DB::table('table_echellons')->where('echellon',$echellon + 1)->first()->anciente  <= $date_diff) {
            $key++;
            $indemnite = Indemnite::where('id_grade', $agent->id_grade)->where('echellon', $echellon + 1)->first();
            if($indemnite->indice ?? 0 !=0){
                $echellon = $echellon + 1;
                $ag = $this->newAgent($agent, null, $echellon);
                $history_echellon[$key] = $ag;
            }

            else{
                break;
            }

        }
        $ags = $this->newAgent($agent, null, $echellon);
        $ags->date_echellon = date('Y').'-12-31';
        $history_echellon[$key+1] = $ags;
        $Nagent = $this->newAgent($agent, null, $echellon);
        //$dateDiff = $history_echellon[1]->date_echellon->diffInMonths($history_echellon[0]->date_echellon);


//dd($history_echellon);

            return $history_echellon;
        } catch (\Throwable $th) {
            //dd($agent);
            $history_echellon[0] = $agent;
            $history_echellon[1] = $agent;
            $history_echellon[2] = $agent;
           // dd($history_echellon);
            return $history_echellon;
        }
    }



        public function get_Montant($history_echellon){



            $total_brut = 0;
            $total_cmr = 0;
            $total_amo = 0;
            $total =0;

            //$history_echellons = $history_echellon;
            foreach ($history_echellon as $key => $value) {

                if ($key < count($history_echellon) - 1 ) {
                    $month_Diff = $history_echellon[$key+1]->date_echellon->diffInMonths($history_echellon[$key]->date_echellon);


                    $avancement[0] = new Avancement($history_echellon[0],$history_echellon[$key+1]["date_echellon"]->format('Y-m-d'));
                   // else
                   // $avancement[$key] = new Avancement($history_echellon[$key]);

                    $avancement[$key+1] = new Avancement($history_echellon[$key+1]);
                       // dd($avancement);
                    $brut1 = $avancement[0]->total_montant()/12;
                    $brut2 = $avancement[$key+1]->total_montant()/12;
                    $t_brut = ($brut2 - $brut1) * $month_Diff;
                    $total_brut = $total_brut + $t_brut;

                    $cmr1 = $avancement[0]->CMR()/12;
                    $cmr2 = $avancement[$key+1]->CMR()/12;
                    $t_cmr = ($cmr2 - $cmr1) * $month_Diff;
                    $total_cmr = $total_cmr + $t_cmr;

                    $amo1 = $avancement[0]->AMO()/12;
                    $amo2 = $avancement[$key+1]->AMO()/12;
                    $t_amo = ($amo2 - $amo1) * $month_Diff;
                    $total_amo = $total_amo - $t_amo;

                    $total = $total + $total_brut + $total_cmr + $total_amo;

                    $history_echellon[$key+1]["montant"] = ["Brut"=>$t_brut,"CMR"=>$t_cmr,"AMO"=>$t_amo,"total_brut"=>$total_brut,"total_cmr"=>$total_cmr,"total_amo"=>$total_amo,"total"=>$total];
                    //dd($history_echellon);

                }




        }
        //dd($history_echellon);
        return $history_echellon;
        }
}
