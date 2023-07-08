@extends('templates.site')
@section('content')
<div class="row " style="justify-content: flex-end;">
          <div class="col-sm-3 pl-0 mb-2">
            <input type="text" class="form-control"  id="txt_cherch" placeholder="بحث ..." aria-label="Recipient's username" aria-describedby="button-addon2">
          </div>
          <div class="col-sm-2 ">
            <a href="{{route('stagiaire.create')}}" class="btn btn-primary"><i class="ti ti-user-plus"></i> إضافة متدرب جديد</a>
          </div>
            <div class="row">

              <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                  <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">لائحة المتدربين</h5>
                    <div class="table-responsive">
                      <table class="table table-striped text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                          <tr>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">إسم المتدرب </h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">تاريخ بداية التدريب</h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">تاريخ نهاية التدريب</h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">إعدادات</h6>
                            </th>
                          </tr>
                        </thead>
                        <tbody id="table_stagiaires">
                            @foreach ($stagiaires as $stagiaires)
                          <tr>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">{{$stagiaires->nom_stagiaire_ar}}</h6>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">{{$stagiaires->date_debut_stage->format('Y-m-d')}}</p>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">{{$stagiaires->date_fin_stage->format('Y-m-d')}}</p>
                            </td>
                            <td class="border-bottom-0">
                              <div class="d-flex align-items-center gap-2">
                               <a href="{{route('stagiaire.details',$stagiaires->id_stagiaire)}}"><span class="badge bg-primary rounded-3 fw-semibold"><i class="ti ti-eye"></i></span></a>
                               <a href="{{route('stagiaire.edit',$stagiaires->id_stagiaire)}}"><span class="badge bg-success rounded-3 fw-semibold"><i class="ti ti-edit"></i></span></a>
                               <a href="{{route('stagiaire.delete',$stagiaires->id_stagiaire)}}" onclick="return confirm('هل تريد إزالة هذا المتدرب من قاعدة البيانات ؟')"><span class="badge bg-danger rounded-3 fw-semibold"><i class="ti ti-trash"></i></span></a>
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
    $url = "{{ route('stagiaire.filter') }}"
    $("#table_stagiaires").html("");
    get_table_ajax_find($text,$url,"#table_stagiaires")

    });
@endsection
