<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Bureau;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PhpOffice\PhpWord\PhpWord;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
        //dd
         $agents = $agents = Agent::where('id_position','=',1)->get();
         $bureaus = Bureau::all();

         return view('pages.absences.index',compact('agents','bureaus'));
     }




     public function generatePdf(Request $request)
     {
        if ($request->bureau!=0){

            $bureaus = Bureau::with('agents')->where('id_bureau',$request->bureau)->get();
            $nom_file = $bureaus->first()->nom_bureau_ar.'';
        }
        else{
            $bureaus = Bureau::with('agents')->get();
            $nom_file = 'جميع المكاتب';
        }



   return view('pdf.document', compact('bureaus','nom_file'));

     }


    public function filter(Request $request)
    {
        //dd($request->text);
        $agents = Agent::where('id_position','=',1);

        if ($request->text != '0') {

            $agents = $agents
                ->where('id_bureau',$request->text);

        }
       // dd($agents->getQuery());

        $agents = $agents->get();
        //dd($agents->first());
        $data = '';

        foreach ($agents as $key => $agents) {
            $show_route = route('agent.details',$agents->id_agent);
            $nom_grade_ar = $agents->grade->nom_grade_ar;

            $data .=
            "<tr>
            <td class='border-bottom-0'>
              <h6 class='fw-semibold mb-0'>$agents->mat</h6>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$agents->ppr</p>
            </td>
            <td class='border-bottom-0'>
                <h6 class='fw-semibold mb-1'>$agents->nom_ar</h6>
                <span class='fw-normal'>$agents->nom_fr</span>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$nom_grade_ar</p>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$agents->echelle</p>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$agents->echellon</p>
            </td>
            <td class='border-bottom-0'>
              <div class='d-flex  align-items-center gap-2'>
                <a href='$show_route' class='badge bg-primary rounded-3 fw-semibold'><i class='ti ti-eye'></i></a>
              </div>
            </td>
          </tr>";
        }
        //dd($data);
        return Response(['data' => $data]);

    }
}
