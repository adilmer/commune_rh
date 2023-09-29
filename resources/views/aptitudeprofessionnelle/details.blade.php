@extends('templates.site')
@section('content')
<div class="row " style="justify-content: flex-end;">

      <div class="col-sm-2 m-3 ">
        <button class="btn btn-primary"> لائحة الدورات</button>
      </div>
        <div class="row fs-4">

          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">معلومات الدورة </h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <tbody>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">سنة الدورة   :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">2023</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">تاريخ إجراء الإمتحان :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">11/12/2023</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">آخر اجل لإستلام الملفات :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">01/11/2023</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0"></h6>
                        </td>
                          <td class="border-bottom-0">
                            <a href="/aptitudeprofessionnelle/accepte" class="btn btn-danger"><i class="ti ti-file-text"></i> تحديد المستوفون للشروط</a>
                            <a href="#" class="btn btn-danger"><i class="ti ti-file-text"></i> تحميل الإعلان</a>
                            <a href="#" class="btn btn-danger"><i class="ti ti-file-text"></i>تحميل القرار </a>
                            <a href="/aptitudeprofessionnelle/listeexamenecrit" class="btn btn-danger"><i class="ti ti-file-text"></i> المدعوون للإمتحان الكتابي</a>
                            <a href="/aptitudeprofessionnelle/listeexamenoral" class="btn btn-danger"><i class="ti ti-file-text"></i> المدعوون للإمتحان الشفاوي  </a><br><br>
                            <a href="/aptitudeprofessionnelle/comiteexamen" class="btn btn-danger"><i class="ti ti-file-text"></i> لجنة الإمتحان</a>
                            <a href="/aptitudeprofessionnelle/comitegardiens" class="btn btn-danger"><i class="ti ti-file-text"></i> لجنة الحراسة</a>
                            <a href="/aptitudeprofessionnelle/notationexamenecrit" class="btn btn-danger"><i class="ti ti-file-text"></i>  نقط الإمتحان الكتابي </a>
                            <a href="/aptitudeprofessionnelle/notationexamenoral" class="btn btn-danger"><i class="ti ti-file-text"></i>  نقط الإمتحان الشفوي </a>
                            <a href="#" class="btn btn-danger"><i class="ti ti-file-text"></i> النتائج النهائية</a>
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
