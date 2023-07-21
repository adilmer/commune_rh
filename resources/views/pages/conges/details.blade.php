@extends('templates.site')
@section('content')
<div class="container">

    <div class="row " style="justify-content: flex-end;">

      <div class="col-sm-2 m-3 ">
        <a href="{{route('conge.index')}}" class="btn btn-primary"> لائحة الرخص</a>
      </div>
        <div class="row fs-4">

          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">معلومات الرخصة </h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <tbody>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">الإسم الكامل  :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$conge->agent->nom_ar}} </p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">تاريخ بداية الرخصة :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$conge->date_debut_conge->format('Y-m-d')}} </p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">تاريخ نهاية الرخصة :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$conge->date_fin_conge->format('Y-m-d')}} </p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">تاريخ استئناف العمل :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$conge->date_prise->format('Y-m-d')}} </p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">   عدد الأيام :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"> {{$conge->nbr_jours}} </p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">   نوع الرخصة :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">   رخصة {{$conge->type_conge}} ({{$conge->annee_conge}})</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">   ينوب عنه :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"> {{$conge->remplacant}} </p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">العنوان خلال الإجازة  :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$conge->adresse_conge}} </p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <h5 class="card-title fw-semibold mt-5 ">التوقيعات : </h5>
              <div class="row">
                <div class="col-4">
                  <select class="custom-select custom-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                    <option value="1"> </option>
                    <option selected value="2"> رئيس المكتب </option>
                    <option  value="3"> رئيس المصلحة </option>
                    <option value="4">رئيس القسم  </option>
                  </select>
                </div>
                <div class="col-4">
                      <select class="custom-select custom-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                        <option value="1" > </option>
                        <option  value="2"> رئيس المكتب </option>
                      <option selected value="3"> رئيس المصلحة </option>
                      <option value="4">رئيس القسم  </option>
                    </select>
                </div>
                <div class="col-4">
                  <select class="custom-select custom-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                    <option value="1" > </option>
                    <option  value="2"> رئيس المصلحة </option>
                    <option selected value="3">رئيس القسم  </option>
                    <option  value="4">  مدير المصالح </option>
                    <option  value="5">  رئيس المجلس الجماعي  </option>
                  </select>
                </div>
              </div>
              <div class="btnsucc m-4 text-start">
                <button class="btn btn-danger"><i class="ti ti-file-text"></i> طباعة الطلب  </button>
                <button class="btn btn-danger"><i class="ti ti-file-text"></i> طباعة القرار</button>
              </div>

              </div>

            </div>
          </div>

        </div>


      </div>


    </div>

@endsection
