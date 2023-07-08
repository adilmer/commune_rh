@extends('templates.site')
@section('content')
<div class="row " style="justify-content: flex-end;"> 
      
      <div class="col-sm-2 m-3 ">
        <button class="btn btn-primary"> لائحة المتدربين</button>
      </div>
        <div class="row fs-4">
         
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
                          <p class="mb-0 fw-normal">يوسف السامي</p>
                        </td> 
                      </tr> 
                      <tr>  
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">تاريخ بداية التدريب :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">  12/02/2023 </p>
                        </td> 
                      </tr> 
                      <tr>  
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">تاريخ نهاية التدريب :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">  12/03/2023 </p>
                        </td> 
                      </tr> 
                      <tr>  
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">  مؤسسة المتدرب :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">  OFPPT </p>
                        </td> 
                      </tr>
                      <tr>  
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">  شعبة المتدرب :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">  الإعلاميات </p>
                        </td> 
                      </tr>
                      <tr>  
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">الوثائق  :</h6>
                        </td>
                          <td class="border-bottom-0">
                            <button class="btn btn-danger"><i class="ti ti-file-text"></i> طلب المتدرب </button>
                            <button class="btn btn-danger"><i class="ti ti-file-text"></i> الموافقة</button><br><br>
                            <button class="btn btn-danger"><i class="ti ti-file-text"></i>  ورقة الحضور</button>
                            <button class="btn btn-danger"><i class="ti ti-file-text"></i> شهادة التدريب  </button>
                        </td> 
                      </tr>     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
