@extends('templates.site')
@section('content')



<div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="upload mt-3">
                  <article id="contentupload">  
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <img src="../assets/images/upload.png" alt="upload" width="80px" />
                      <p>إضافة ملفات للأرشيف </p>
                    </a> 
                  </article> 
                </div>
              </div>
            </div>
          </div> 
        </div>

        <div class="input-group ">
          <div class="container">
            <div class="row "> 
              <div class="col-sm-4 ">
                <input type="text" class="form-control  " placeholder="بحث ..." aria-label="Recipient's username" aria-describedby="button-addon2">
              </div>
              <div class="col-sm-4 mb-4  ">
                <div class="row">
                  <div class="col-10 pl-0">
                    <select id="inputState" class="form-select">
                      <option selected> - تصنيف الوثيقة   ...  </option>
                      <option>الواردات </option>
                      <option>الصادرات</option>
                      <option>المراسلات</option>
                    </select>
                  </div>
                  
                </div> 
              </div>
              <div class="col-sm-4  ">
                <input type="date" class="form-control  " placeholder="Search Client" aria-label="Recipient's username" aria-describedby="button-addon2">
              </div> 
            </div>
          </div>
           
          </div> 


        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <table class="table table-striped text-nowrap mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">رقم الملف</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">إسم الملف</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">تاريخ الرفع</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">خيارات</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="border-bottom-0"><h6 class="fw-semibold mb-0">1</h6></td>
                      <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-1">مراسلة تقوية القدرات</h6>                      
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">12/02/2022</p>
                      </td>
                      <td class="border-bottom-0">
                          <a href="#">
                          <span class="badge bg-primary rounded-3 fw-semibold"><i class="ti ti-eye"></i></span>
                          </a> 
                          <a href="#">
                          <span class="badge bg-success rounded-3 fw-semibold"><i class="ti ti-edit"></i></span>
                          </a>  
                          <a href="#">
                          <span class="badge bg-danger rounded-3 fw-semibold"><i class="ti ti-trash"></i></span>
                          </a>  
                      </td>
                    </tr> 
                  </tbody>
                </table>
              </div>
            </div>
          </div> 
        </div>


@endsection
