@extends('templates.site')
@section('content')


<div class="row " style="justify-content: flex-end;"> 
      <div class="col-sm-3 pl-0 mb-2">
        <input type="text" class="form-control  " placeholder="بحث ..." aria-label="Recipient's username" aria-describedby="button-addon2">
      </div>
      <div class="col-sm-2 ">
        <button class="btn btn-primary"><i class="ti ti-user-plus"></i> </button>
      </div>
        <div class="row">
         
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">لائحة الموظفين المتقاعدين </h5>
                <div class="table-responsive">
                  <table class="table table-striped text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">MAT</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">PPR</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">الإسم الكامل</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">الدرجة</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">السلم</h6>
                        </th>
                         <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">الرتبة</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">تاريخ الإحالة على التقاعد</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">مشاهدة</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>  
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">1</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">189965</p>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">وليد المرزوكي</h6>
                            <span class="fw-normal">Oualid Elmerzougui</span>                          
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">تقني الدرجة الثالتة</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">9</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">1</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">12/03/2023 </p>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <a href="#">
                              <span class="badge bg-primary rounded-3 fw-semibold"><i class="ti ti-eye"></i></span>  
                            </a>
                          </div>
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
