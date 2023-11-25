@extends('templates.site')
@section('content')

<div class="inputsearch row" style="justify-content: flex-end;">

  <div class="col-sm-6 pl-0 mb-2  ">
    <input type="text" class="form-control " id="txt_cherch" placeholder="بحث ..." aria-label="Recipient's username" aria-describedby="button-addon2">
  </div>
  <div class="col-sm-3 pl-0 mb-2  ">
    <select id="id_position" class="form-select">
      <option value="0" selected> - كل الموظفين  ...  </option>
      @foreach($positions as $positions)
      <option value="{{$positions->id_position}}">{{$positions->nom_position_ar}}</option>
      @endforeach
    </select>
  </div>
  <div class="col-sm-2 ">
    <a href="{{route('agent.create')}}" class="btn btn-primary"><i class="ti ti-user-plus"></i> إضافة موظف</a>

  </div>



      <div class="row" >
        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="card w-100">

            <div class="card-body p-4">
                <button type="button" style="float:left" class="btn btn-sm btn-outline-success text-capitalize float-left btn-round" data-bs-toggle="modal"
                      data-bs-target="#modal-export_agent">
                      <i class="la la-download"></i>تحميل Excel
                  </button>
                  <button type="button" style="float:left"
                            class="btn btn-sm btn-outline-muted text-capitalize float-left btn-round mx-1"
                            data-bs-toggle="modal" data-bs-target="#modal-import_eleve">
                            <i class="ti ti-upload"></i> استيراد وتحيين لوائح الموظفين
                        </button>
              <h5 class="card-title  fw-semibold mb-4">لائحة الموظفين</h5>


              </div>

              <div class="table ">
                <table class="table  mb-0 align-middle">
                  <thead class="text-dark fs-4 ">
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

                      <th class="border-bottom-0 col-sm-1">
                        <h6 class="fw-semibold mb-0">نوع الإحالة</h6>
                      </th>

                      <th class="border-bottom-0 pos">
                        <h6 class="fw-semibold mb-0">تاريخ الإحالة</h6>
                      </th>
                      <th class="border-bottom-0 pos" >
                        <h6 class="fw-semibold mb-0">مكان الإحالة</h6>
                      </th>

                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">إعدادات</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody id="table_agents">
                      {{-- liste agents --}}
                      @foreach ($agents as $agents)
                    <tr>
                      <td class="border-bottom-0">
                        <div class="img" >
                            @if (isset($agents->photo))
                            <img class="rounded-circle " width="50px" height="50px" onerror="this.onerror=null; this.src='{{asset('photos_agents/user-1.jpg')}}'" src="{{asset('photos_agents/'.$agents->photo)}}" alt="" srcset="">
                            @else
                            <img class="rounded-circle" width="50px" height="50px" src="../assets/images/profile/user-1.jpg" alt="" srcset="">
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
                        <p class="mb-0 fw-normal">{{$agents->bureau->service->nom_service_ar ?? 'بدون'}}</p>
                      </td>

                      <td class="border-bottom-0 pos">
                        <p class="mb-0 fw-normal">{{$agents->position->nom_position_ar}}</p>
                      </td>

                      <td class="border-bottom-0 pos col-sm-1">
                        <p class="mb-0 fw-normal">{{$agents->date_position!=null ? \Carbon\Carbon::parse($agents->date_position)->format('Y-m-d') : ''}}</p>
                      </td>
                      <td class="border-bottom-0 pos">
                        <p class="mb-0 fw-normal">{{$agents->lieu_position}}</p>
                      </td>


                      <td class="border-bottom-0">
                        <div class="d-flex  align-items-center gap-2">
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
 <!-- modal import_eleve-->

 <div class="modal fade" id="modal-import_eleve" tabindex="-1" aria-labelledby="modal-import_eleve" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('import.importData') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id=""> استيراد وتحيين لوائح الموظفين من اندماج</h5>
                </div>
                <div class="modal-body">
                    <label for="fileCsv"> رفع الملف بصيغة Excel </label>
                    <input type="file" name="fileCsv" class="form-control"
                        accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                        id="fileCsv">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-primary">تأكيد</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
@section('script')
$("#txt_cherch").on("input", function(){
    $text = this.value
    $url = "{{ route('agent.filter') }}"
    $("#table_agents").html("");
    get_table_ajax_find($text,$url,"#table_agents")

    });
    $("#id_position").on("change", function(){
        $id = this.value
        $url = "{{ route('agent.filterByPosition') }}"
        $("#table_agents").html("");
        get_table_ajax_find($id,$url,"#table_agents")

        });
@endsection
