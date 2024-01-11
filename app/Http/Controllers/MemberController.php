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
use CreateMombersTable;

class MemberController extends Controller
{
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

<<<<<<< HEAD
        $grademembers = Grademembre::all();

        return \view('member.create',compact('grademembers'));
=======

       $grademembres = Grademembre::all();
        return \view('member.create',compact('grademembres'));
>>>>>>> 873db83e64cc1fd2b44dd362c68233dffc9f198e

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
        $members = Member::all();
        $grademembre = Grademembre::all();
        return view('member.salaire',compact('members','grademembre'));
    }

    public function decision(Request $request)
    {
        $member = Member::findOrFail($request->id_member);
        $grademembre = Grademembre::all();
        $data =[];

        $data['nomfr'] = $member->nomfr_member;
        $data['echelle'] = $member->echelle;
        $name ="";
        $filename = $this->exportWord($data,$request->type,$name);

        return response()->download($filename)->deleteFileAfterSend(true);


    }
}
