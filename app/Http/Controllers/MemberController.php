<?php


namespace App\Http\Controllers;

use App\Models\Agent;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PhpOffice\PhpWord\PhpWord;
use App\Models\Document;
use App\Models\Grademembre;
use App\Models\Member;
use App\Models\Momber;
use App\Traits\ExportTrait;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CreateMombersTable;
use NumberFormatter;

class MemberController extends Controller
{
    use ExportTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        $grademembre = Grademembre::all();
        return view('member.index',compact('members','grademembre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $grademembres = Grademembre::all();
        return \view('member.create',compact('grademembres'));
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

        Member::create(
            $requestData);
        return redirect(route('member.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $member = Member::findOrFail($request->id_member);

       return view('member.details',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   $grademembres = Grademembre::all();
        $member = Member::findOrFail($request->id_member);

        return \view('member.edit',compact(['member','grademembres']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $member = Member::findOrFail($request->id_member);
        $requestData = $request->all();
		$member->update($requestData);

        return redirect(route('member.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $member = Member::findOrFail($request->id_member);
        $documents = Document::where('id_member',$request->id_member)->get();
        foreach($documents as $documents)
        $member->delete();
        return redirect(route('member.index'));
    }
    public function salaire()
    {
        $members = Member::orderby('id_member')->get();
        $grademembre = Grademembre::all();
        return view('member.salaire',compact('members','grademembre'));
    }

    public function ind_member(Request $request)
    {
        $members = Member::where('status_member',1)->get();
        $moisD = Carbon::parse($request->dateD);
        $moisF = Carbon::parse($request->dateF);
        $mD = $moisD->format('m');
        $mF = $moisF->format('m');

    $dateD = $moisD->firstOfMonth()->toDateString();
    $dateF = $moisF->lastOfMonth()->toDateString();

        $FilePath = public_path("template_documents\ind_member.xlsx");

     $spreadsheet = IOFactory::load($FilePath);
     $text1 = "DU $dateD AU $dateF";
     // Get the active worksheet
     $worksheet = $spreadsheet->getActiveSheet();

     $worksheet->setCellValue('F8', $text1);

       foreach ($members as $key => $member) {

       $nomfr_member = strtoupper($member->nomfr_member);
       $date_naiss =  $member->date_naiss;
       $cin = strtoupper($member->cin) ;
       $rib = $member->rib;
       $nomfr_grade = strtoupper($member->grademember->nomfr_grade);
       $indeminite = $member->grademember->indeminite * ($mF - $mD + 1);

       $worksheet->setCellValue('D'.($key+10),$nomfr_member );
       $worksheet->setCellValue('E'.($key+10),$date_naiss );
       $worksheet->setCellValue('F'.($key+10),$nomfr_grade );
       $worksheet->setCellValue('G'.($key+10),$cin );
       $worksheet->setCellValue('H'.($key+10),$rib );
       $worksheet->setCellValue('I'.($key+10),$indeminite);


        }


     // Save the modified Excel file
     $writer = new Xlsx($spreadsheet);
     $writer->save('files.xlsx');
     return response()->download('files.xlsx', "Etat nominatif des Indéminité.xlsx");
    }

    public function decision(Request $request)
    {
       // dd($request->all());
        if($request->id_member){
        $member = Member::findOrFail($request->id_member);
        $moisD = Carbon::parse($request->dateD);
        $moisF = Carbon::parse($request->dateF);
        $mD = $moisD->format('m');
        $mF = $moisF->format('m');

    $dateD = $moisD->firstOfMonth()->toDateString();
    $dateF = $moisF->lastOfMonth()->toDateString();
    $list_month = [
        "janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"
    ];
    $text ="";
    for ($i=$mD; $i < $mF; $i++) {
        $text .= $list_month[$i-1] . ", ";
    }
    $text .= "et " .$list_month[$mF-1];
        $data =[];

        $data['nomfr_member'] = $member->nomfr_member;
        $data['rib'] = $member->rib;
        $data['banque'] = $member->banque;
        $data['nomfr_grade'] = $member->grademember->nomfr_grade;
        $data['indeminite'] = $member->grademember->indeminite;
        $data['dateD'] = $dateD;
        $data['dateF'] = $dateF;
        $data['text'] = $text;
        $data['N'] = $mF - $mD + 1 ;
        //$data['Montant'] = $data['indeminite'] * $data['N'] ;




        $name ="decision de $member->nomfr_member ";
        $filename = $this->exportWord($data,"decisionmember",$name);
        return response()->download($filename)->deleteFileAfterSend(true);
}
    else{
        $members = Member::where('status_member',1)->orderby('id_member')->get();
        $moisD = Carbon::parse($request->dateD);
        $moisF = Carbon::parse($request->dateF);
        $mD = $moisD->format('m');
        $mF = $moisF->format('m');

    $dateD = $moisD->firstOfMonth()->toDateString();
    $dateF = $moisF->lastOfMonth()->toDateString();

        $FilePath = public_path("template_documents\ind_member.xlsx");

     $spreadsheet = IOFactory::load($FilePath);
     $text1 = "DU $dateD AU $dateF";
     // Get the active worksheet
     $worksheet = $spreadsheet->getActiveSheet();

     $worksheet->setCellValue('F8', $text1);

       foreach ($members as $key => $member) {

       $nomfr_member = strtoupper($member->nomfr_member);
       $date_naiss =  $member->date_naiss->format('Y-m-d');
       $cin = strtoupper($member->cin) ;
       $rib = $member->rib;
       $nomfr_grade = strtoupper($member->grademember->nomfr_grade);
       $indeminite = $member->grademember->indeminite * ($mF - $mD + 1);
        $text0 = "02-10-10.10-10-11";
        $text2 = "Indéminité au Président  et aux Conseillers y Ayant Droit";
       $worksheet->setCellValue('B'.($key+11),$text0 );
       $worksheet->setCellValue('C'.($key+11),$text2 );
       $worksheet->setCellValue('D'.($key+11),$nomfr_member );
       $worksheet->setCellValue('E'.($key+11),$date_naiss );
       $worksheet->setCellValue('F'.($key+11),$nomfr_grade );
       $worksheet->setCellValue('G'.($key+11),$cin );
       $worksheet->setCellValue('H'.($key+11),$rib );
       $worksheet->setCellValue('I'.($key+11),$indeminite);


        }


     // Save the modified Excel file
     $writer = new Xlsx($spreadsheet);
     $writer->save('files.xlsx');
     return response()->download('files.xlsx', "Etat nominatif des Indéminité.xlsx");
    }




    }



}
