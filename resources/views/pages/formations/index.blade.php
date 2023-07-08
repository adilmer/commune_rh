@extends('templates.site')
@section('content')
<div class="row " style="justify-content: flex-end;">
          <div class="col-sm-3 pl-0 mb-2">
            <input type="text" id="txt_cherch" class="form-control  " placeholder="بحث ..." aria-label="Recipient's username" aria-describedby="button-addon2">
          </div>
          <div class="col-sm-2 ">
            <a href="{{route('formation.create')}}" class="btn btn-primary"><i class="ti ti-user-plus"></i> إضافة تكوين جديد</a>
          </div>
            <div class="row">

              <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                  <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">لائحة التكوينات</h5>
                    <div class="table-responsive">
                      <table class="table table-striped text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                          <tr>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">موضوع التكوين</h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">تاريخ التكوين</h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">إعدادات</h6>
                            </th>
                          </tr>
                        </thead>
                        <tbody id="table_formations">
                            @foreach ($formations as $formations)
                          <tr>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">{{$formations->nom_formation_ar}}</h6>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">{{$formations->date_formation->format('Y-m-d')}}</p>
                            </td>
                            <td class="border-bottom-0">
                              <div class="d-flex align-items-center gap-2">
                               <a href="{{route('formation.details',$formations->id_formation)}}"><span class="badge bg-primary rounded-3 fw-semibold"><i class="ti ti-eye"></i></span></a>
                               <a href="{{route('formation.edit',$formations->id_formation)}}"><span class="badge bg-success rounded-3 fw-semibold"><i class="ti ti-edit"></i></span></a>
                               <a href="{{route('formation.delete',$formations->id_formation)}}"  onclick="return confirm('هل تريد إزالة هذا التكوين من قاعدة البيانات ؟')"  ><span class="badge bg-danger rounded-3 fw-semibold"><i class="ti ti-trash"></i></span></a>
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
@endsection

@section('script')
$("#txt_cherch").on("input", function(){
    $text = this.value
    $url = "{{ route('formation.filter') }}"
    $("#table_formations").html("");
    get_table_ajax_find($text,$url,"#table_formations")

    });
@endsection
