<?php

namespace App\Http\Controllers;
set_time_limit(0);
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
        $agent = Agent::findOrFail(18);
        $new_echellon = $agent->echellon + 1;
        $new_grade = null ;

        $Nagents =$this->newAgent($agent,$new_grade,8);



        $agent =$this->newAgent($agent,$new_grade,8);
        $Nagent =$this->newAgent($agent,$new_grade,10);
        $avancement = new Avancement($agent,$Nagent->date_echellon->format('Y-m-d'));


        $Navancement = new Avancement($Nagent,$Nagent->date_echellon->format('Y-m-d'));
   // dd($avancement->getData(),$Navancement->getData());
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
        $table_echellon0 = DB::table('table_echellons')->where('echellon',$agent->echellon)->first();
        $table_echellon = DB::table('table_echellons')->where('echellon',$new_echellon)->first();
        $anciente = $table_echellon->anciente - $table_echellon0->anciente;
        if($agent->echelle=="H*E")
        $new_agent->date_echellon = $new_agent->date_echellon->addYear($anciente+1)->format('Y-m-d');
        else
        $new_agent->date_echellon = $new_agent->date_echellon->addYear($anciente)->format('Y-m-d');

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
       //dd( $agents[73]);
      //  if(!session()->has(date('Y'))){

        $agent =Agent::where("mat",189)->first();
        $ag = $this->get_Montant($this->next_echellon($agent));
          // dd($ag );
        $i=0;
        try {
            //code...

       foreach ($agents as $key => $agent) {



            $table_agents[$key] = $this->get_Montant($this->next_echellon($agent));
           // dd($table_agents[$key][count($table_agents[$key])-2]->montant);
                if(isset($table_agents[$key][count($table_agents[$key])-2]->montant["Brut"])){
            $totalBrut = $totalBrut + $table_agents[$key][count($table_agents[$key])-2]->montant["total_brut"];
            $totalCmr = $totalCmr + $table_agents[$key][count($table_agents[$key])-2]->montant["total_cmr"];
            $totalAmo = $totalAmo + $table_agents[$key][count($table_agents[$key])-2]->montant["total_amo"];
            $total = $total + $table_agents[$key][count($table_agents[$key])-2]->montant["total"];
            $total_montant = ["total_brut"=>$totalBrut,"total_cmr"=>$totalCmr,"total_amo"=>$totalAmo,"total"=>$total];

        }
       /* if($agent->id_agent == 3){
            dd($table_agents);
        } */

        }

    } catch (\Throwable $th) {
       dd($th,$i);
    }
       //dd( $table_agents);
 /// dd( $table_agents[76]);
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

       // $agent =Agent::findOrFail(1);
       if($agent->echelle=="H*E")
        $table_echellon = ["1"=>0,"2"=>3,"3"=>3,"4"=>3,"5"=>3,"6"=>3];
        else
        $table_echellon = ["1"=>0,"2"=>1,"3"=>1,"4"=>2,"5"=>2,"6"=>3,"7"=>3,"8"=>3,"9"=>4,"10"=>4];  
       // dd($agent->echelle,count($table_echellon));
        //$table_echellon = ["1"=>1,"2"=>1,"3"=>2,"4"=>2,"5"=>3,"6"=>3,"7"=>3,"8"=>4,"9"=>4,"10"=>4];
        $echellon = $agent->echellon;
        $history_echellon = null;
        $date_echellon = $agent->date_echellon;


        $history_echellon[0] = $agent;

        $key=1;
        while($echellon + $key <= count($table_echellon) ) {
            $Nagent = $this->newAgent($agent, null, $echellon + $key);


                if($date_echellon->format('Y') <= date('Y')){
                    $currentDate = Carbon::now();
                    $date_diff = $date_echellon->diffInYears($currentDate);
                    $date_echellon = Carbon::parse($Nagent->date_echellon);


              //  dd($date_diff);
                $indemnite = Indemnite::where('id_grade', $Nagent->id_grade)->where('echellon', $echellon + $key)->first();
                   //dd($date_diff,$table_echellon[$echellon + $key - 1]);
                if($table_echellon[$echellon + $key - 1]<= $date_diff && $indemnite!=null) {
                    if($indemnite->indice!=0)
                    $history_echellon[$key] = $Nagent;
                }
             //  dd($agent->date_echellon,$date_echellon->format('Y'));
            }

                $key++;
        }

        $ags = $this->newAgent($history_echellon[count($history_echellon)-1], null, null);
        $ags->date_echellon = (date('Y')).'-12-31';
        $history_echellon[count($history_echellon)] = $ags;
      // dd($history_echellon);
            return $history_echellon;
    }





        public function get_Montant($history_echellon){



            $total_brut = 0;
            $total_cmr = 0;
            $total_amo = 0;
            $total =0;

            //$history_echellons = $history_echellon;
            foreach ($history_echellon as $key => $value) {

                if ($key < count($history_echellon)-1 ) {
                    $currentDate = Carbon::parse((date('Y')+1)."-01-01");
                    
                        $month_Diff = $history_echellon[$key+1]->date_echellon->diffInMonths($currentDate);
                
                    

                   // dd($month_Diff,$history_echellon[$key+1]->date_echellon,$currentDate);
                    $avancement[$key] = new Avancement($history_echellon[$key],$history_echellon[$key+1]["date_echellon"]->format('Y-m-d'));
                   // else
                   // $avancement[$key] = new Avancement($history_echellon[$key]);

                    $avancement[$key+1] = new Avancement($history_echellon[$key+1]);
                       //dd($avancement);

                    $brut1 = $avancement[$key]->total_montant()/12;
                    $brut2 = $avancement[$key+1]->total_montant()/12;
                    $t_brut = ($brut2 - $brut1) * $month_Diff;
                    $total_brut = $total_brut + $t_brut;


                    $cmr1 = $avancement[$key]->CMR()/12;
                    $cmr2 = $avancement[$key+1]->CMR()/12;
                    $t_cmr = ($cmr2 - $cmr1) * $month_Diff;
                    $total_cmr = $total_cmr + $t_cmr;


                    $amo1 = $avancement[$key]->AMO()/12;
                    $amo2 = $avancement[$key+1]->AMO()/12;
                    $t_amo = ($amo2 - $amo1) * $month_Diff;
                    $total_amo = $total_amo + $t_amo;

                    $total = $total + $total_brut + $total_cmr + $total_amo;

                    $history_echellon[$key+1]["montant"] = ["Brut"=>$t_brut,"CMR"=>$t_cmr,"AMO"=>$t_amo,"total_brut"=>$total_brut,"total_cmr"=>$total_cmr,"total_amo"=>$total_amo,"total"=>$total];


                }

        }


        return $history_echellon;
        }
}
