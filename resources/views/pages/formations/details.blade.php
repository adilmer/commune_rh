@extends('templates.site')
@section('content')
<div class="row " style="justify-content: flex-end;"> 
          
          <div class="col-sm-2 m-3 ">
            <button class="btn btn-primary"> لائحة التكوينات</button>
          </div>
            <div class="row">
             
              <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                  <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">معلومات التكوين</h5>
                    <div class="table-responsive">
                      <table class="table text-nowrap mb-0 align-middle">
                        <tbody>
                          <tr>  
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">موضوع التكوين :</h6>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">تدبير الموارد المالية للجماعة</p>
                            </td> 
                          </tr> 
                          <tr>  
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">تاريخ التكوين :</h6>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">12/02/2023</p>
                            </td> 
                          </tr> 
                          <tr>  
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0"> المستفيد من التكوين : </h6>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">وليد المرزوكي و حسن سيداتي</p>
                            </td> 
                          </tr>  
                          <tr>  
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">رسالة التكوين :</h6>
                            </td>
                              <td class="border-bottom-0">
                                <button class="btn btn-danger"><i class="ti ti-file-text"></i> مشاهدة </button>
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
