@extends('templates.site')
@section('content')
<div class="row mt-5" style="justify-content: flex-end"> 
      <div class="col-sm-4  mb-2">
        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="بحث ...">
        <datalist id="datalistOptions " >
          <option value="وليد المرزوكي">
          <option value="يوسف الأيوبي">
          <option value="علي السماكي">
          <option value="عادل المرزوكي">
          <option value="اسماعيل اية">
        </datalist>
      </div>
      <div class="col-sm-2 ">
        <button class="btn btn-primary"><i class="ti ti-search"></i> بحث</button>
      </div>
        <div class="row">
         
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">أمر بتحويل لا رجعة فيه</h5>
                <div class="col-5">
                  <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                      <tbody>
                        <tr>  
                          <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">الإسم الكامل  :</h6>
                          </td>
                          <td class="border-bottom-0">
                            <p class="mb-0 fw-normal"> وليد المرزوكي</p>
                          </td> 
                        </tr> 
                        <tr>  
                          <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">إسم البنك :</h6>
                          </td>
                          <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">BMCE</p>
                          </td> 
                        </tr> 
                        <tr>  
                          <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">  رقم الحساب البنكي  : </h6>
                          </td>
                          <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">100545677656765766  </p>
                          </td> 
                        </tr>      
                      </tbody>
                    </table>
                  </div>
                  
                </div>
                <div class="btnsucc m-4 text-start">
                  <button class="btn btn-success"><i class="ti ti-printer"></i> طبــاعـة  </button>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
@endsection
