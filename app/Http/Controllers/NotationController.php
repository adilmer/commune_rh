<?php

namespace App\Http\Controllers;

use App\Models\Notation;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class NotationController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notations = Notation::all();
       return view('pages.notations.index', compact('notations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.notations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           // dd($request->all());
       foreach($request->annee_notation as $key => $annee_notation){
        $notation = Notation::where('id_agent',$request->id_agent)->where('annee_notation',$annee_notation);
            if($notation->count() > 0){
                $notation->update([
                    "note"=>$request->note[$key]
                ]);
            }
            else{
                Notation::create([
                    "note"=>$request->note[$key],
                    "annee_notation"=>$annee_notation,
                    "id_agent"=>$request->id_agent
                ]);
            }
       }


        return redirect(route('notation.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $notation = Notation::findOrFail($request->id_notation);
       return view('pages.notations.details', compact('notation'));
    }

    public function filter(Request $request)
    {
        //dd($request->text);
        $notations = Notation::orderby('id_notation');

        if ($request->text != '') {

            $notations = $notations
                ->where(function ($query) use ($request) {
                    $query->where('nom_notation_ar', 'like', '%' . $request->text . '%');
                });

        }
       // dd($notations->getQuery());

        $notations = $notations->get();
        //dd($notations->first());
        $data = '';

        foreach ($notations as $key => $notations) {
            $show_route = route('notation.details',$notations->id_notation);
            $edit_route = route('notation.edit',$notations->id_notation);
            $delete_route = route('notation.delete',$notations->id_notation);

            $data .=
            "<tr>
            <td class='border-bottom-0'>
              <h6 class='fw-semibold mb-0'>$notations->nom_notation_ar</h6>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>{$notations->date_debut_stage->format('Y-m-d')}</p>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>{$notations->date_fin_stage->format('Y-m-d')}</p>
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
        $notation = Notation::findOrFail($request->id_notation);
       return view('pages.notations.edit', compact('notation'));
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
        $notation = Notation::findOrFail($request->id_notation);
        $notation->update($request->all());
       return redirect()->route('notation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $notation = Notation::findOrFail($request->id_notation);
        File::delete(public_path('documents_notations/' . $notation->path_notation));
        $notation->delete();

        return redirect(route('notation.index'));
    }
}
