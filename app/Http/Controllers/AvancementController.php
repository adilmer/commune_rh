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
use App\Traits\ExportTrait;
use App\Traits\UploadTrait;
use Exception;
use NumberFormatter;

class AvancementController extends Controller
{
    use ExportTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function etat_engagement(Request $request)
    {
        $agent0 = Agent::findOrFail($request->id_agent);
        $old_echellon = $request->old_echellon;
        $new_grade = null;

        $agent = $this->newAgent($agent0, $new_grade, $old_echellon);



        $Nagent = $this->newAgent($agent0, $new_grade, $old_echellon + 1);
        $avancement = new Avancement($agent, $Nagent->date_echellon->format('Y-m-d'));


        $Navancement = new Avancement($Nagent, $Nagent->date_echellon->format('Y-m-d'));

        return view('pages.avancement.etat_engagement', compact('avancement', 'Navancement', 'agent', 'Nagent'));
    }

    public function newAgent($agent, $new_grade = null, $new_echellon = null)
    {
        if ($new_echellon == null) {
            $new_echellon = $agent->echellon;
            $new_date_echellon = $agent->date_echellon;
        }
        if ($new_grade == null) {
            $new_grade = $agent->id_grade;
        }
        $new_agent = Agent::where('id_agent', $agent->id_agent)->first();
        $new_agent->echellon = $new_echellon;
        $new_agent->id_grade = $new_grade;
        if ($agent->echelle != "H*E") {
            $table_echellon0 = DB::table('table_echellons')->where('echellon', $agent->echellon)->first();
            $table_echellon = DB::table('table_echellons')->where('echellon', $new_echellon)->first();
            $anciente0 = $table_echellon->anciente - $table_echellon0->anciente;
            $anciente1 = $table_echellon->anciente - $table_echellon0->anciente;
            $anciente = $table_echellon->anciente - $table_echellon0->anciente;
            $new_agent->date_echellon = $new_agent->date_echellon->addYear($anciente)->format('Y-m-d');
        } else {
            $anciente = $new_agent->echellon - $agent->echellon;
            $new_agent->date_echellon = $agent->date_echellon->addYear(3 * $anciente)->format('Y-m-d');
        }




        $avancement = new Avancement($new_agent);

        $new_agent->indice = $avancement->Indice($new_grade, $new_echellon);

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

        $agent = Agent::where("mat", 189)->first();
        $ag = $this->get_Montant($this->next_echellon($agent));
        // dd($ag );
        $i = 0;
        try {
            //code...

            foreach ($agents as $key => $agent) {



                $table_agents[$key] = $this->get_Montant($this->next_echellon($agent));
                // dd($table_agents[$key][count($table_agents[$key])-2]->montant);
                if (isset($table_agents[$key][count($table_agents[$key]) - 2]->montant["Brut"])) {
                    $totalBrut = $totalBrut + $table_agents[$key][count($table_agents[$key]) - 2]->montant["total_brut"];
                    $totalCmr = $totalCmr + $table_agents[$key][count($table_agents[$key]) - 2]->montant["total_cmr"];
                    $totalAmo = $totalAmo + $table_agents[$key][count($table_agents[$key]) - 2]->montant["total_amo"];
                    $total = $total + $table_agents[$key][count($table_agents[$key]) - 2]->montant["total"];
                    $total_montant = ["total_brut" => $totalBrut, "total_cmr" => $totalCmr, "total_amo" => $totalAmo, "total" => $total];
                }
                /* if($agent->id_agent == 3){
            dd($table_agents);
        } */
            }
        } catch (\Throwable $th) {
            dd($th, $i);
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
        return view('avancement.index2', compact('table_agents', 'total_montant'));
    }

    public function avancement_echellon(Request $request)
    {
        $agents = Agent::where('id_position', 11)->get();
        return view('pages.avancement.indexechellon', compact('agents'));
    }

    public function next_echellon($agent)
    {

        // $agent =Agent::findOrFail(1);
        if ($agent->echelle == "H*E")
            $table_echellon = ["1" => 0, "2" => 3, "3" => 3, "4" => 3, "5" => 3, "6" => 3];
        else
            $table_echellon = ["1" => 0, "2" => 1, "3" => 1, "4" => 2, "5" => 2, "6" => 3, "7" => 3, "8" => 3, "9" => 4, "10" => 4];

        $echellon = $agent->echellon;
        $history_echellon = null;
        $date_echellon = $agent->date_echellon;


        $history_echellon[0] = $agent;

        $key = 1;
        while ($echellon + $key <= count($table_echellon)) {
            $Nagent = $this->newAgent($agent, null, $echellon + $key);


            if ($date_echellon->format('Y') <= date('Y')) {
                $currentDate = Carbon::now();
                $date_diff = $date_echellon->diffInYears($currentDate);
                $date_echellon = Carbon::parse($Nagent->date_echellon);


                //  dd($date_diff);
                $indemnite = Indemnite::where('id_grade', $Nagent->id_grade)->where('echellon', $echellon + $key)->first();
                //dd($date_diff,$table_echellon[$echellon + $key - 1]);
                if ($table_echellon[$echellon + $key - 1] <= $date_diff && $indemnite != null) {
                    if ($indemnite->indice != 0)
                        $history_echellon[$key] = $Nagent;
                }
                //  dd($agent->date_echellon,$date_echellon->format('Y'));
            }

            $key++;
        }

        $ags = $this->newAgent($history_echellon[count($history_echellon) - 1], null, null);
        $ags->date_echellon = (date('Y')) . '-12-31';
        $history_echellon[count($history_echellon)] = $ags;
        // dd($history_echellon);
        return $history_echellon;
    }





    public function get_Montant($history_echellon)
    {



        $total_brut = 0;
        $total_cmr = 0;
        $total_amo = 0;
        $total = 0;

        //$history_echellons = $history_echellon;
        foreach ($history_echellon as $key => $value) {

            if ($key < count($history_echellon) - 1) {
                $currentDate = Carbon::parse((date('Y') + 1) . "-01-01");

                $month_Diff = $history_echellon[$key + 1]->date_echellon->diffInMonths($currentDate);



                // dd($month_Diff,$history_echellon[$key+1]->date_echellon,$currentDate);
                $avancement[$key] = new Avancement($history_echellon[$key], $history_echellon[$key + 1]["date_echellon"]->format('Y-m-d'));
                // else
                // $avancement[$key] = new Avancement($history_echellon[$key]);

                $avancement[$key + 1] = new Avancement($history_echellon[$key + 1]);
                //dd($avancement);

                $brut1 = $avancement[$key]->total_montant() / 12;
                $brut2 = $avancement[$key + 1]->total_montant() / 12;
                $t_brut = ($brut2 - $brut1) * $month_Diff;
                $total_brut = $total_brut + $t_brut;


                $cmr1 = $avancement[$key]->CMR() / 12;
                $cmr2 = $avancement[$key + 1]->CMR() / 12;
                $t_cmr = ($cmr2 - $cmr1) * $month_Diff;
                $total_cmr = $total_cmr + $t_cmr;


                $amo1 = $avancement[$key]->AMO() / 12;
                $amo2 = $avancement[$key + 1]->AMO() / 12;
                $t_amo = ($amo2 - $amo1) * $month_Diff;
                $total_amo = $total_amo + $t_amo;

                $total = $total + $total_brut + $total_cmr + $total_amo;

                $history_echellon[$key + 1]["montant"] = ["Brut" => $t_brut, "CMR" => $t_cmr, "AMO" => $t_amo, "total_brut" => $total_brut, "total_cmr" => $total_cmr, "total_amo" => $total_amo, "total" => $total];
            }
        }


        return $history_echellon;
    }




    public function avancement_echelle(Request $request)
    {
        $agents = Agent::where('id_position', 11)->get();
        return view('pages.avancement.indexechelle', compact('agents'));
    }


    public function tableavancement(Request $request)
    {

        $agents = Agent::where('id_position', 11)->get();

        return view('pages.avancement.tableavancement', compact('agents'));
    }


    public function getinfoAgent(Request $request)
    {

        $agent = Agent::where('id_position', 11)->where('id_agent',$request->text)->first();

        $data = ["echelle"=>$agent->echelle,"echellon"=>$agent->echellon,"indice"=>$agent->indice,"date_echellon"=>$agent->date_echellon->format('Y-m-d')];
       // dd($agent,$data);
        return Response(['data' => $data]);
    }


    public function exporttableavancement(Request $request)
    {

try{


        $annee = $request->annee;
        $grade = $request->grade;
        $id_agents = $request->id_agent;
        //dd($id_agents);
        $echellons = $request->echellon;
        $new_echellons = $request->new_echellon;
        foreach ($echellons as $key => $value) {
            $myAgent = Agent::where('id_agent',$id_agents[$key])->first();
            $agent[] = $this->newAgent($myAgent, null,$echellons[$key]);
            $Nagent[] = $this->newAgent($myAgent, null,$new_echellons[$key]);
        }
       // dd($request->all(),$agent,$Nagent);

    }catch(Exception $e){

    }


        return view('pdf.decision_reclacement', compact('grade','annee','agent','Nagent'));
    }
    public function decison_reclacement(Request $request)
    {
        $agents = Agent::where('id_position', 11)->get();
        return view('pdf.decision_reclacement', compact('agents'));
    }


    public function export_word_arretepromotion(Request $request)
{
     // dd($request->a_echelle);
     $agent = Agent::findOrFail($request->id_agent);
     $data =[];
     $data['nomfr'] = $agent->nom_fr;
     $data['ppr'] = $agent->ppr;
     $data['cin'] = $agent->cin;
     $data['gradefr'] = $agent->grade->nom_grade_fr;

     $data['n_arrete'] = $request->n_arrete;
    //$data['date_arrete'] = $request->date_arrete;
     $data['date_arrete'] = \Carbon\Carbon::parse($request->date_arrete)->format('d/m/Y');
     $data['date_commission'] = \Carbon\Carbon::parse($request->date_commission)->format('d/m/Y');
     $data['annee_arrete'] = \Carbon\Carbon::parse($request->date_arrete)->format('Y');

     $data['a_echellon'] = $request->a_echellon;
     $data['a_echelle'] = $request->a_echelle;
     $data['a_ind'] = $request->a_ind;
     $data['a_dateffet'] = $request->a_dateffet;

     $data['n_echellon'] = $request->n_echellon;
     $data['n_echelle'] = $request->n_echelle;
     $data['n_ind'] = $request->n_ind;
     $data['n_dateffet'] = $request->n_dateffet;
     $data['grade'] = $request->grade;
     $data['dateNow'] = date('d/m/Y');

     if($request->grade=='ADMINISTRATEURM')
     $name =' Le  décret n° 2.63.047  du 06 chaoual 1382 ( 02-03-1963) fixant l échelonnement indiciaire des gouverneurs de préféctures et provinces , des Administrateurs principaux administrateurs et administrateurs adjoints du ministére de l intérieur , tel qu il a été modifié et complété .';
     if($request->grade=='ADMINISTRATEUR')
     $name =' Le  décret n° 2.06.377  du 20 kaada 1431 ( 29-10-2010) portant statut du corps interministériels des Administrateurs .';
     if($request->grade=='REDACTEUR')
     $name =' Le décret  N° 2.10 . 445  du 20 kaada 1431 ( 29-10-2010 ) portant statut du corps  Interministériels des Rédacteurs .';
     if($request->grade=='INFIRMIERS ET TECHNICIENS DE SANTÉ')
     $name ='Le  Décret n° 2-17-535 du 7 moharrem 1439 (28 septembre 2017) portant statut particulier du corps interministériel des infirmiers et des techniciens de santé.';
     if($request->grade=='INGENIEUR')
     $name ='Le  Décret n° 2-11-471 du 15 chaoual 1432 (14 septembre 2011) portant statut particulier du corps intérministriel des ingénieurs';
     if($request->grade=='ADJOINT TECHNIQUE')
     $name ='Le  décret n° 2.14.416 du 24 Juin 2014 modifiant et coplétant Le décret  N° 2.10 . 452  du 29 Octobre 2010 portant statut du corps des Adjoints techniques Interministériels ';
     if($request->grade=='ADJOINT ADMINISTRATIF')
     $name ='décret n° 2.14.417 du 24 Juin 2014 modifiant et complétant Le décret  N° 2.10 . 453  du 29 Octobre 2010 portant statut du corps des Adjoints Administratifs Interministériels . ';
     if($request->grade=='TECHNICIEN')
     $name ='Le décret  N° 2-05-72  du 29 Chaoual 1426 ( 02-12-2005 ) portant statut du corps  Interministériels des Techniciens.';
     if($request->grade=='MÉDECINS ET PHARMACIENS')
     $name ='Le  Décret n° 2-99-651 du 25 joumada Il 1420 (6 octobre 1999) portant statut particulier du corps interministériel des médecins, pharmaciens et chirurgiens-dentistes (B.O n° 4736 du 21 octobre 1999).';
     $data['gradex'] = $name;

     $filename = $this->exportWord($data,'arretepromotion','arretepromotion');


     return response()->download($filename)->deleteFileAfterSend(true);

    }
}
