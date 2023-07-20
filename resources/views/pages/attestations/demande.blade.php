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
                <h5 class="card-title fw-semibold mb-4">طلب وثيقة</h5>
                <div class="col-5">

                  <div class="form-check">
                    <input class="form-check-input fs-6" type="checkbox" value="" id="check1">
                    <label class="form-check-label fs-6" for="check1">
                      شهادة الأجرة
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input fs-6" type="checkbox" value="" id="check2" >
                    <label class="form-check-label fs-6" for="check2">
                      شهادة بيان الإلتزام
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input fs-6" type="checkbox" value="" id="check3" >
                    <label class="form-check-label fs-6" for="check3">
                      شهادة العمل
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input fs-6" type="checkbox" value="" id="check4" >
                    <label class="form-check-label fs-6" for="check4">
                      أمر بتحويل لا رجعة فيه
                    </label>
                  </div>
                  <div class="row mt-5">
                    <div class="col-3">
                      <label class="form-check-label fs-6 pt-2" for="check4">
                        من أجل :
                      </label>
                    </div>
                    <div class="col-9">
                      <div class="form-check">
                      <select class="custom-select custom-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                        <option selected>غرض إداري</option>
                        <option value="1">الحصول على قرض</option>
                        <option value="2">تجديد البطاقة الوطنية</option>
                      </select>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="btnsucc m-4 text-start">
                  <button class="btn btn-success"><i class="ti ti-printer"></i> طباعة الطلب </button>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
@endsection
