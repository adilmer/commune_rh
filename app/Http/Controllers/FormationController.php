<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Formation;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class FormationController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::all();
       return view('pages.formations.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::where('id_position','1')->get();

        return view('pages.formations.create', compact('agents'));
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
        if ($request->path_formation!=null){
            $requestData['path_formation'] = $this->saveAs($request->path_formation,time(),"documents_formations");
        }
        Formation::create(
            $requestData);

        return redirect(route('formation.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $formation = Formation::findOrFail($request->id_formation);
       return view('pages.formations.details', compact('formation'));
    }

    public function filter(Request $request)
    {
        //dd($request->text);
        $formations = Formation::orderby('id_formation');

        if ($request->text != '') {

            $formations = $formations
                ->where(function ($query) use ($request) {
                    $query->where('nom_formation_ar', 'like', '%' . $request->text . '%');
                });

        }
       // dd($formations->getQuery());

        $formations = $formations->get();
        //dd($formations->first());
        $data = '';

        foreach ($formations as $key => $formations) {
            $show_route = route('formation.details',$formations->id_formation);
            $edit_route = route('formation.edit',$formations->id_formation);
            $delete_route = route('formation.delete',$formations->id_formation);

            $data .=
            "<tr>
            <td class='border-bottom-0'>
              <h6 class='fw-semibold mb-0'>$formations->nom_formation_ar</h6>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>{$formations->date_formation->format('Y-m-d')}</p>
            </td>
            <td class='border-bottom-0'>
              <div class='d-flex align-items-center gap-2'>
               <a href='$show_route'><span class='badge bg-primary rounded-3 fw-semibold'><i class='ti ti-eye'></i></span></a>
               <a href='$edit_route'><span class='badge bg-success rounded-3 fw-semibold'><i class='ti ti-edit'></i></span></a>
               <a href='$delete_route' onclick='return confirm(`هل تريد إزالة هذا التكوين من قاعدة البيانات ؟`)' class='badge bg-danger rounded-3 fw-semibold'><i class='ti ti-trash'></i></a>
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
        $formation = Formation::findOrFail($request->id_formation);
        $agents = Agent::where('id_position','1')->get();
       return view('pages.formations.edit', compact('formation','agents'));
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
        $formation = Formation::findOrFail($request->id_formation);
        $formation->update($request->all());
       return redirect()->route('formation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $formation = Formation::findOrFail($request->id_formation);
        File::delete(public_path('documents_formations/' . $formation->path_formation));
        $formation->delete();

        return redirect(route('formation.index'));
    }
}
