<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Category;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class ArchiveController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $archives = Archive::all();
       $categories=Category::all();
       return view('pages.archives.index', compact('archives','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
         if ($request->path_archive!=null){
            $requestData['path_archive'] = $this->saveAs($request->path_archive,time(),"documents_archive");
        }
         Archive::create($requestData);

         return redirect()->route('archive.index');
    }

    public function storeCategorie(Request $request)
    {
        if ($request->id!="") {
         $DataRequest['nom_categorie_ar'] = $request->id;
        // dd($DataRequest);
         Category::create($DataRequest);
            }
         $data = Category::select('id_categorie as id','nom_categorie_ar as nom')->get();

       return Response($data);

    }

    public function filterByCategorie(Request $request)
    {
        //dd($request);
        $archives = Archive::orderby('id_archive');

        if ($request->text != '') {

            $archives = $archives
                ->where('id_categorie',$request->text);
        }


        $archives = $archives->get();
       // dd($agents->first());
        $data = '';

        foreach ($archives as $key => $archives) {
            $nom_categorie_ar = $archives->category->nom_categorie_ar;
            $doc_url=asset('documents_agents/'.$archives->path_archive);
            $data .=
            "<tr>
            <td class='border-bottom-0'><h6 class='fw-semibold mb-0'>$archives->id_archive</h6></td>
            <td class='border-bottom-0'>
                <h6 class='fw-semibold mb-1'>$archives->nom_archive_ar</h6>
            </td>
            <td class='border-bottom-0'>
                        <h6 class='fw-semibold mb-1'>$nom_categorie_ar</h6>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$archives->created_at</p>
            </td>
            <td class='border-bottom-0'>
                 <a target='_blank' href='$doc_url' class='badge bg-primary rounded-3 fw-semibold'><i class='ti ti-eye'></i></a>
                 <a class='badge bg-success rounded-3 fw-semibold' data-bs-toggle='modal' data-nom_archive_ar='$archives->nom_archive_ar' data-id_archive='$archives->id_archive' data-id_categorie='$archives->id_categorie' data-bs-target='#editArchive'><i class='ti ti-edit'></i></a>
                  <a href='route('archive.delete',$archives->id_archive)' onclick='return confirm(`هل تريد إزالة هذا الملف من قاعدة البيانات ؟`)' class='badge bg-danger rounded-3 fw-semibold'><i class='ti ti-trash'></i></a>
            </td>
          </tr>";
        }
        //dd($data);
        return Response(['data' => $data]);

    }


    public function filterByDate(Request $request)
    {
        //dd($request);
        $archives = Archive::orderby('id_archive');

        if ($request->text != '') {

            $archives = $archives
                ->where('created_at','like', '%' . $request->text . '%');
        }


        $archives = $archives->get();
       // dd($agents->first());
        $data = '';

        foreach ($archives as $key => $archives) {
            $nom_categorie_ar = $archives->category->nom_categorie_ar;
            $doc_url=asset('documents_agents/'.$archives->path_archive);
            $data .=
            "<tr>
            <td class='border-bottom-0'><h6 class='fw-semibold mb-0'>$archives->id_archive</h6></td>
            <td class='border-bottom-0'>
                <h6 class='fw-semibold mb-1'>$archives->nom_archive_ar</h6>
            </td>
            <td class='border-bottom-0'>
                        <h6 class='fw-semibold mb-1'>$nom_categorie_ar</h6>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$archives->created_at</p>
            </td>
            <td class='border-bottom-0'>
                 <a target='_blank' href='$doc_url' class='badge bg-primary rounded-3 fw-semibold'><i class='ti ti-eye'></i></a>
                 <a class='badge bg-success rounded-3 fw-semibold' data-bs-toggle='modal' data-nom_archive_ar='$archives->nom_archive_ar' data-id_archive='$archives->id_archive' data-id_categorie='$archives->id_categorie' data-bs-target='#editArchive'><i class='ti ti-edit'></i></a>
                  <a href='route('archive.delete',$archives->id_archive)' onclick='return confirm(`هل تريد إزالة هذا الملف من قاعدة البيانات ؟`)' class='badge bg-danger rounded-3 fw-semibold'><i class='ti ti-trash'></i></a>
            </td>
          </tr>";
        }
        //dd($data);
        return Response(['data' => $data]);

    }

    public function filter(Request $request)
    {
        //dd($request);
        $archives = Archive::orderby('id_archive');

        if ($request->text != '') {

            $archives = $archives
                ->where(function ($query) use ($request) {
                    $query->where('id_archive', 'like', '%' . $request->text . '%')
                          ->orWhere('nom_archive_ar', 'like', '%' . $request->text . '%');
                });
        }


        $archives = $archives->get();
       // dd($agents->first());
        $data = '';

        foreach ($archives as $key => $archives) {
            $nom_categorie_ar = $archives->category->nom_categorie_ar;
            $doc_url=asset('documents_agents/'.$archives->path_archive);
            $data .=
            "<tr>
            <td class='border-bottom-0'><h6 class='fw-semibold mb-0'>$archives->id_archive</h6></td>
            <td class='border-bottom-0'>
                <h6 class='fw-semibold mb-1'>$archives->nom_archive_ar</h6>
            </td>
            <td class='border-bottom-0'>
                        <h6 class='fw-semibold mb-1'>$nom_categorie_ar</h6>
            </td>
            <td class='border-bottom-0'>
              <p class='mb-0 fw-normal'>$archives->created_at</p>
            </td>
            <td class='border-bottom-0'>
                 <a target='_blank' href='$doc_url' class='badge bg-primary rounded-3 fw-semibold'><i class='ti ti-eye'></i></a>
                 <a class='badge bg-success rounded-3 fw-semibold' data-bs-toggle='modal' data-nom_archive_ar='$archives->nom_archive_ar' data-id_archive='$archives->id_archive' data-id_categorie='$archives->id_categorie' data-bs-target='#editArchive'><i class='ti ti-edit'></i></a>
                  <a href='route('archive.delete',$archives->id_archive)' onclick='return confirm(`هل تريد إزالة هذا الملف من قاعدة البيانات ؟`)' class='badge bg-danger rounded-3 fw-semibold'><i class='ti ti-trash'></i></a>
            </td>
          </tr>";
        }
        //dd($data);
        return Response(['data' => $data]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
       // dd($request);
        $archive = Archive::findOrFail($request->id_archive);
       // dd($request);
        $requestData = $request->all();


		$archive->update($requestData);

        return redirect(route('archive.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      //  dd($request);
        $archive = Archive::findOrFail($request->id_archive);
        File::delete(public_path('documents_archive/' . $archive->path_archive));
        $archive->delete();
        return redirect(route('archive.index'));
    }
}
