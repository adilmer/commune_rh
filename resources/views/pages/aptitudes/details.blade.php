@extends('templates.site')
@section('content')
<div class="row " style="justify-content: flex-end;">

      <div class="col-sm-2 m-3 ">
        <a href="{{route('aptitude.index')}}" class="btn btn-primary"> لائحة الدورات</a>
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
                          <p class="mb-0 fw-normal">{{$aptitude->annee_aptitude}}</p>
                        </td>
                      </tr>
                     
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">تاريخ إجراء الإمتحان :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$aptitude->dateD_aptitude->format('Y-m-d')}}</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">مكان إجراء الإمتحان :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$aptitude->lieu_aptitude}}</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">آخر اجل لإستلام الملفات :</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$aptitude->dateF_aptitude->format('Y-m-d')}}</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0"></h6>
                        </td>
                          <td class="border-bottom-0 mx-0 px-0">
                            <a href="{{route('aptitude.accepte',$aptitude->id_aptitude)}}" class="btn btn-danger"><i class="ti ti-file-text"></i> تحديد المستوفون للشروط</a>
                            <a href="#" class="btn btn-danger"><i class="ti ti-file-text"></i> تحميل الإعلان</a>
                            <a href="#" class="btn btn-danger"><i class="ti ti-file-text"></i>تحميل القرار </a>
                            <a href="{{route('aptitude.comiteExamen',$aptitude->id_aptitude)}}" class="btn btn-danger"><i class="ti ti-file-text"></i> لجنة الإمتحان</a>
                            <a href="{{route('aptitude.comiteSurve',$aptitude->id_aptitude)}}" class="btn btn-danger"><i class="ti ti-file-text"></i> لجنة الحراسة</a><br><br>
                            <a href="{{route('aptitude.ecrit',$aptitude->id_aptitude)}}" class="btn btn-danger"><i class="ti ti-file-text"></i> المدعوون للإمتحان الكتابي</a>
                            <a href="{{route('aptitude.notationEcrit',$aptitude->id_aptitude)}}" class="btn btn-danger"><i class="ti ti-file-text"></i>  نقط الإمتحان الكتابي </a>
                            <a href="{{route('aptitude.orale',$aptitude->id_aptitude)}}" class="btn btn-danger"><i class="ti ti-file-text"></i> المدعوون للإمتحان الشفوي  </a>
                            <a href="{{route('aptitude.notationOrale',$aptitude->id_aptitude)}}" class="btn btn-danger"><i class="ti ti-file-text"></i>  نقط الإمتحان الشفوي </a>
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
