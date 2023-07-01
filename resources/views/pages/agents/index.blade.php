@extends('templates.site')
@section('content')
<div class="row " style="justify-content: flex-end;">
    <div class="col-sm-3 pl-0 mb-2">
      <input type="text" class="form-control  " placeholder="بحث ..." aria-label="Recipient's username" aria-describedby="button-addon2">
    </div>
    <div class="col-sm-2 ">
      <a href="{{route('agent.create')}}" class="btn btn-primary"><i class="ti ti-user-plus"></i> إضافة موظف</a>
    </div>
      <div class="row">

        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="card w-100">
            <div class="card-body p-4">
              <h5 class="card-title fw-semibold mb-4">لائحة الموظفين</h5>
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0"></h6>
                      </th>
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
                        <h6 class="fw-semibold mb-0">المصلحة</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">إعدادات</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                      {{-- liste agents --}}
                      @foreach ($agents as $agents)
                    <tr>
                      <td class="border-bottom-0">
                        <div class="img" >
                            @if ($agents->photo==null)
                            <img class="rounded-circle" width="50px" src="../assets/images/profile/user-1.jpg" alt="" srcset="">
                            @else
                            <img class="rounded-circle" width="50px" src="../assets/images/profile/user-1.jpg" alt="" srcset="">
                            @endif
                        </div>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">{{$agents->mat}}</h6>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{$agents->ppr}}</p>
                      </td>
                      <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-1">{{$agents->nom_ar}}</h6>
                          <span class="fw-normal">{{$agents->nom_fr}}</span>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{$agents->grade->nom_grade_ar}}</p>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{$agents->echelle}}</p>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{$agents->echellon}}</p>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{$agents->bureau->service->nom_service_ar}}</p>
                      </td>
                      <td class="border-bottom-0">
                        <div class="d-flex align-items-center gap-2">
                          <a href="{{route('agent.details',$agents->id_agent)}}" class="badge bg-primary rounded-3 fw-semibold"><i class="ti ti-eye"></i></a>
                          <a href="{{route('agent.edit',$agents->id_agent)}}" class="badge bg-success rounded-3 fw-semibold"><i class="ti ti-edit"></i></a>
                          <a href="{{route('agent.delete',$agents->id_agent)}}" onclick="return confirm('هل تريد إزالة هذا الموظف من قاعدة البيانات ؟')" class="badge bg-danger rounded-3 fw-semibold"><i class="ti ti-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>


  </div>
@endsection
