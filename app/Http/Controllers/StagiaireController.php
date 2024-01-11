<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use App\Traits\UploadTrait;
use App\Traits\ExportTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;



class StagiaireController extends Controller
{
    use UploadTrait;
    use ExportTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stagiaires = Stagiaire::all();
       return view('pages.stagiaires.index', compact('stagiaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.stagiaires.create');
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
        if ($request->path_stagiaire!=null){
            $requestData['path_stagiaire'] = $this->saveAs($request->path_stagiaire,time(),"documents_stagiaires");
        }
        Stagiaire::create(
            $requestData);

        return redirect(route('stagiaire.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $stagiaire = Stagiaire::findOrFail($request->id_stagiaire);
       return view('pages.stagiaires.details', compact('stagiaire'));
    }

    public function filter(Request $request)
    {
        //dd($request->text);
        $stagiaires = Stagiaire::orderby('id_stagiaire');

        if ($request->text != '') {

            $stagiaires = $stagiaires
                ->where(function ($query) use ($request) {
                    $query->where('nom_stagiaire_ar', 'like', '%' . $request->text . '%');
                });

        }
       // dd($stagiaires->getQuery());

        $stagiaires = $stagiaires->get();
        //dd($stagiaires->first());
        $data = '';

        foreach ($stagiaires as $key => $stagiaires) {
            $show_route = route('stagiaire.details',$stagiaires->id_stagiaire);
            $edit_route = route('stagiaire.edit',$stagiaires->id_stagiaire);
            $delete_route = route('stagiaire.delete',$stagiaires->id_stagiaire);

            $data .=
            "<tr>
            <td class='border-bottom-0'>
              <h6 class='fw-semibold mb-0'>$stagiaires->nom_stagiaire_ar</h6>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>{$stagiaires->date_debut_stage->format('Y-m-d')}</p>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>{$stagiaires->date_fin_stage->format('Y-m-d')}</p>
            </td>
            <td class='border-bottom-0'>
              <div class='d-flex align-items-center gap-2'>
               <a href='$show_route'><span class='badge bg-primary rounded-3 fw-semibold'><i class='ti ti-eye'></i></span></a>
               <a href='$edit_route'><span class='badge bg-success rounded-3 fw-semibold'><i class='ti ti-edit'></i></span></a>
               <a href='$delete_route' onclick='return confirm(`هل تريد إزالة هذا المتدرب من قاعدة البيانات ؟`)' class='badge bg-danger rounded-3 fw-semibold'><i class='ti ti-trash'></i></a>
            </td>
          </tr>";
        }
        //dd($data);
        return Response(['data' => $data]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $stagiaire = Stagiaire::findOrFail($request->id_stagiaire);
       return view('pages.stagiaires.edit', compact('stagiaire'));
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
        $stagiaire = Stagiaire::findOrFail($request->id_stagiaire);
        $stagiaire->update($request->all());
       return redirect()->route('stagiaire.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $stagiaire = Stagiaire::findOrFail($request->id_stagiaire);
        File::delete(public_path('documents_stagiaires/' . $stagiaire->path_stagiaire));
        $stagiaire->delete();

        return redirect(route('stagiaire.index'));
    }

    public function export_word_attestation(Request $request)
    {
        $stagiaire = Stagiaire::findOrFail($request->id_stagiaire);
        $data =[];

           $data['nomfr'] = $stagiaire->nom_stagiaire_fr;
           $data['nomar'] = $stagiaire->nom_stagiaire_ar;
           $data['direction'] = $stagiaire->direction_stagiaire;
           $data['datedebut'] = $stagiaire->date_debut_stage;
           $data['datefin'] = $stagiaire->date_debut_stage;



           if($request->type=='attestationstage')
            $name ='attestationstage';
            if($request->type=='acceptationstage')
            $name ='acceptationstage';
        $filename = $this->exportWord($data,$request->type,$name);

        return response()->download($filename)->deleteFileAfterSend(true);

    }
}
