@extends('templates.site')
@section('content')
<div class="row " style="justify-content: flex-end;">
    <form action="{{route('stagiaire.export_word_attestation')}}" method="get">

      <div class="col-sm-2 m-3 ">
        <button class="btn btn-primary"> لائحة المتدربين</button>
      </div>
        <div class="row fs-4">
            <input type="hidden" class="form-control" value="{{$stagiaire->id_stagiaire}}" id="id_stagiaire" name="id_stagiaire" placeholder="" value="" required>
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">معلومات المتدرب </h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <tbody>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">الإسم الكامل  :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$stagiaire->nom_stagiaire_ar}} | {{$stagiaire->nom_stagiaire_fr}}</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">تاريخ بداية التدريب :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">  {{$stagiaire->date_debut_stage->format('Y-m-d')}} </p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">تاريخ نهاية التدريب :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">  {{$stagiaire->date_fin_stage->format('Y-m-d')}} </p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">  مؤسسة المتدرب :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">  {{$stagiaire->direction_stagiaire}} </p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">  شعبة المتدرب :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">  {{$stagiaire->filiere_stagiaire}} </p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">الوثائق  :</h6>
                        </td>
                          <td class="border-bottom-0">
                            <a {{$stagiaire->path_stagiaire==null ? 'x' : ''}}href="{{asset('documents_stagiaires/'.$stagiaire->path_stagiaire)}}"  class="btn btn-danger"><i class="ti ti-file-text"></i> طلب المتدرب </a>
                            <button name="type" value="acceptationstage" class="btn btn-danger"><i class="ti ti-file-text"></i> الموافقة</button><br><br>
                            <a href="{{route('stagiaire.export_presence_stagiaire')}}?id_stagiaire={{$stagiaire->id_stagiaire}}"  class="btn btn-danger"><i class="ti ti-file-text"></i>  ورقة الحضور</a>
                            <button name="type" value="attestationstage" class="btn btn-danger"><i class="ti ti-file-text"></i> شهادة التدريب  </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </form>
      </div>
@endsection
