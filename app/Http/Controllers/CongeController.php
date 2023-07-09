<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Conge;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CongeController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conges = Conge::all();
       return view('pages.conges.index', compact('conges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        return view('pages.conges.create',compact('agents'));
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
        if ($request->path_conge!=null){
            $requestData['path_conge'] = $this->saveAs($request->path_conge,time(),"documents_conges");
        }
        Conge::create(
            $requestData);

        return redirect(route('conge.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $conge = Conge::findOrFail($request->id_conge);
       return view('pages.conges.details', compact('conge'));
    }

    public function filter(Request $request)
    {
        //dd($request->text);
        $conges = Conge::orderby('id_conge');

        if ($request->text != '') {

            $conges = $conges
                ->where(function ($query) use ($request) {
                    $query->where('nom_conge_ar', 'like', '%' . $request->text . '%');
                });

        }
       // dd($conges->getQuery());

        $conges = $conges->get();
        //dd($conges->first());
        $data = '';

        foreach ($conges as $key => $conges) {
            $show_route = route('conge.details',$conges->id_conge);
            $edit_route = route('conge.edit',$conges->id_conge);
            $delete_route = route('conge.delete',$conges->id_conge);

            $data .=
            "<tr>
            <td class='border-bottom-0'>
              <h6 class='fw-semibold mb-0'>$conges->nom_conge_ar</h6>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>{$conges->date_debut_stage->format('Y-m-d')}</p>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>{$conges->date_fin_stage->format('Y-m-d')}</p>
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
        $conge = Conge::findOrFail($request->id_conge);
       return view('pages.conges.edit', compact('conge'));
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
        $conge = Conge::findOrFail($request->id_conge);
        $conge->update($request->all());
       return redirect()->route('conge.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $conge = Conge::findOrFail($request->id_conge);
        $conge->delete();

        return redirect(route('conge.index'));
    }
}
