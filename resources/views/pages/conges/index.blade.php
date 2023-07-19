@extends('templates.site')
@section('content')
<div class="container">

    <div class="row " style="justify-content: flex-end;">
      <div class="col-sm-3 pl-0 mb-2">
        <input type="text" class="form-control"  id="txt_cherch" placeholder="بحث ..." aria-label="Recipient's username" aria-describedby="button-addon2">
      </div>
      <div class="col-sm-2 ">
        <a href="{{route('conge.create')}}" class="btn btn-primary"><i class="ti ti-user-plus"></i> إضافة رخصة جديدة</a>
      </div>
        <div class="row">

          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">لائحة الرخص</h5>
                <div class="table-responsive">
                  <table class="table table-striped text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">إسم الموظف </h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">تاريخ بداية الرخصة</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">تاريخ نهاية الرخصة</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">عدد الأيام</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">نوع الرخصة</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">برسم سنة </h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0"> وضعية الطلب </h6>
                          </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">إعدادات</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody id="table_conges">
                        @foreach ($conges as $conges)

                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">{{$conges->agent->nom_ar}}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$conges->date_debut_conge->format('Y-m-d')}}</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$conges->date_fin_conge->format('Y-m-d')}}</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$conges->nbr_jours}}</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$conges->type_conge}}</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$conges->annee_conge}}</p>
                        </td>
                        <td class="border-bottom-0">
                            <div class="form-check form-switch text-center">
                                <input class="form-check-input position-absolute" type="checkbox" name="{{$conges->id_conge}}" role="switch" id="checkbox_status" {{$conges->statut_conge==0 ? '' : 'checked disabled'}}>
                            </div>
                          </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <a href="{{route('conge.details',$conges->id_conge)}}" class="badge bg-primary rounded-3 fw-semibold"><i class="ti ti-eye"></i></a>
                            <a href="{{route('conge.edit',$conges->id_conge)}}" class="badge bg-success rounded-3 fw-semibold"><i class="ti ti-edit"></i></a>
                            <a href="{{route('conge.delete',$conges->id_conge)}}" onclick='return confirm(`هل تريد حذف هذه الرخصة من قاعدة البيانات ؟`)' class="badge bg-danger rounded-3 fw-semibold"><i class="ti ti-trash"></i></a>
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

@section('script')
$("#txt_cherch").on("input", function(){
    $text = this.value
    $url = "{{ route('conge.filter') }}"
    $("#table_conges").html("");
    get_table_ajax_find($text,$url,"#table_conges")

    });
$("#checkbox_status").on("change", function(){
        $text = this.name;
        $url = "{{ route('conge.change_statut') }}"
        $("#table_conges").html("");
        get_table_ajax_find($text,$url,"#table_conges")

        });
@endsection
