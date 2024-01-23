<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Grade;
use App\Models\Indemnite;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ImportController extends Controller
{
    public function importData(Request $request) {

        $FilePath = $request->file('fileCsv');
        $mydata = \Excel::toArray([], $FilePath);
       ///dd($mydata);
        $mydata = $mydata[0];
        array_shift($mydata);
      // dd($mydata);
        $agent=null;
        foreach ($mydata as $key => $data) {
         //   dd($mydata);
try {
    //code...
            if($data[35]!=""){
            $ppr =  $data[1];
            $cin =  $data[2].intval($data[3]);
          //  dd($cin);
            $nom_fr =  $data[5];
            $date_naiss =  Carbon::createFromFormat('d/m/Y',$data[6])->format('Y-m-d');
            $sexe =  $data[12];
            $date_rec =   Carbon::createFromFormat('d/m/Y',$data[16])->format('Y-m-d');
            $id_position =  $data[22];
            if ($id_position!="11") {
                $date_position =   Carbon::createFromFormat('d/m/Y',$data[23])->format('Y-m-d');
            } else {
                $date_position = null;
            }
            $fonction =  $data[38];
            $id_fonction = $this->getId($fonction,"nom_fonction_fr","fonctions");
            if ($data[39]!="") {
                $date_fonction =   Carbon::createFromFormat('d/m/Y',$data[39])->format('Y-m-d');
            } else {
                $date_fonction = null;
            }


            $nom_grade_fr = explode(",",$data[28])[0];
            $id_grade = $this->getId($nom_grade_fr,"nom_grade_fr","grades");
            $date_grade =   Carbon::createFromFormat('d/m/Y',$data[30])->format('Y-m-d');
            $echellon =  $data[33];
            $date_echellon =  Carbon::createFromFormat('d/m/Y',$data[36])->format('Y-m-d');
            $date_tuto =  Carbon::createFromFormat('d/m/Y',$data[43])->format('Y-m-d');
            $grade = Grade::findOrFail($id_grade);

            if ($grade==null) {
                $echelle =  $data[32];
            }
            else{
                $echelle = $grade->echelle;
            }
            $indim = Indemnite::where('id_grade',$id_grade)->where('echellon',$echellon)->first();
            if ($indim==null) {
                $indice =  $data[34];
            }
            else{
                $indice = $indim->indice;
            }

              $agent = compact('ppr','cin','id_grade','nom_fr','date_naiss','date_position','id_fonction','date_fonction','sexe','indice','date_rec','id_position','date_grade','echelle','echellon','date_echellon','date_tuto');
               // dd($agent);
              $agent_data = Agent::where('ppr',$ppr)->first();
              if ($agent_data==null) {
                Agent::create($agent);
            }
            else{
                $agent_data->update($agent);
            }


            }
            } catch (\Throwable $th) {
                dd($th);
            }


        }

        return Redirect(route('agent.index'));


    }

    private function getId($text,$nom_column, $tables)
    {

        $table = DB::table($tables);
        $classe = 'App\\Models\\' . str_replace('_', '', ucfirst($tables));
        $classe =  substr($classe, 0, strlen($classe) - 1);;

        $data=[];
            if(is_array($nom_column)){
                for ($i=0; $i <count($nom_column) ; $i++) {
                    $table->where($nom_column[$i],$text[$i]);
                    $data[$nom_column[$i]] = $text[$i];
                }

                $table_count = $table->count();
                $table = $table->first();
               //dd($table);
                if ($table_count==0) {
                   $table =  $classe::create($data);



                }

            }
            else {
                $table->where($nom_column,$text);
                $table_count = $table->count();
                $table = $table->first();
                $data[$nom_column] = $text;
            if ($table_count==0) {
                $table =  $classe::create($data);
            }

            }

            $primaryKey = app($classe)->getKeyName();
            $id = $table->$primaryKey;

            return $id;
    }
}
