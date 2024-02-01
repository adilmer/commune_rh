@extends('templates.site')
@section('content')
<div class="card">
    <form action="{{route('commission.update')}}" enctype="multipart/form-data" method="post">
        @csrf
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">تعديل لائحة وتواريخ اللجان </h5>
            <div class="card">
              <div class="card-body">
                <div class="row">
                    <div class="col-5"></div>
                  <div class="col-2  my-4">
                    <label  for="nom_formation_ar" >السنة</label>

                    <input type="hidden"  name="annee_commission" value="{{$annee_commissions}}">
                    <input type="number" class="form-control" id="nom_formation_ar" name="annee_commission" value="{{$annee_commissions}}">
                  </div>
                  <div class="col-5"></div>
                <div class="alert alert-secondary" role="alert">
                <h2 class="card-title fw-semibold mt-4 text-center">هيئة متصرفي وزارة الداخلية</h2>
                </div>
                  <div class="col-4 my-4">
                    <label for="date_formation">تاريخ الهيئة</label>
                    @php
                        $dateCommission = App\Models\Commission::where('annee_commission', $annee_commissions)
                         ->where('id_statu', 1)
                          ->value('date_commission');
                    @endphp
                    <input type="date"  name="date_commission[]"  class="form-control" id="date_commission" value="{{$dateCommission->format('Y-m-d')}}"/>
                  </div>
                  <div class="col-4 my-4">
                    <label for="participantes"> تاريخ القرار </label>
                    @php
                    $datearrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                     ->where('id_statu', 1)
                      ->value('date_arrete');
                @endphp
                    <input type="date"  name="date_arrete[]"  class="form-control" id="date_arrete"  value="{{$datearrete->format('Y-m-d')}}"/>
                </div>
                <div class="col-4 my-4">
                    <label for="participantes"> رقم القرار </label>
                    @php
                    $narrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                     ->where('id_statu', 1)
                      ->value('n_arrete');
                @endphp
                    <input type="number"  name="n_arrete[]"  class="form-control" id="date_formation"  value="{{$narrete}}"/>
                </div>
                <div class="alert alert-secondary" role="alert">
                <h2 class="card-title fw-semibold mt-4 text-center">هيئة المتصرفين المشتركين</h2>
                </div>
                <div class="col-4 my-4">
                    <label for="date_formation">تاريخ الهيئة</label>
                    @php
                        $dateCommission = App\Models\Commission::where('annee_commission', $annee_commissions)
                         ->where('id_statu', 2)
                          ->value('date_commission');
                    @endphp
                    <input type="date"  name="date_commission[]"  class="form-control" id="date_commission" value="{{$dateCommission->format('Y-m-d')}}"/>
                  </div>
                  <div class="col-4 my-4">
                    <label for="participantes"> تاريخ القرار </label>
                    @php
                    $datearrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                     ->where('id_statu', 2)
                      ->value('date_arrete');
                @endphp
                    <input type="date"  name="date_arrete[]"  class="form-control" id="date_arrete"  value="{{$datearrete->format('Y-m-d')}}"/>
                </div>
                <div class="col-4 my-4">
                    <label for="participantes"> رقم القرار </label>
                    @php
                    $narrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                     ->where('id_statu', 2)
                      ->value('n_arrete');
                @endphp
                    <input type="number"  name="n_arrete[]"  class="form-control" id="date_formation"  value="{{$narrete}}"/>
                </div>
                <div class="alert alert-secondary" role="alert">
                  <h2 class="card-title fw-semibold mt-4 text-center">هيئة التقنيين</h2>
                  </div>
                  <div class="col-4 my-4">
                    <label for="date_formation">تاريخ الهيئة</label>
                    @php
                        $dateCommission = App\Models\Commission::where('annee_commission', $annee_commissions)
                         ->where('id_statu', 3)
                          ->value('date_commission');
                    @endphp
                    <input type="date"  name="date_commission[]"  class="form-control" id="date_commission" value="{{$dateCommission->format('Y-m-d')}}"/>
                  </div>
                  <div class="col-4 my-4">
                    <label for="participantes"> تاريخ القرار </label>
                    @php
                    $datearrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                     ->where('id_statu', 3)
                      ->value('date_arrete');
                @endphp
                    <input type="date"  name="date_arrete[]"  class="form-control" id="date_arrete"  value="{{$datearrete->format('Y-m-d')}}"/>
                </div>
                <div class="col-4 my-4">
                    <label for="participantes"> رقم القرار </label>
                    @php
                    $narrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                     ->where('id_statu', 3)
                      ->value('n_arrete');
                @endphp
                    <input type="number"  name="n_arrete[]"  class="form-control" id="date_formation"  value="{{$narrete}}"/>
                </div>
                <div class="alert alert-secondary" role="alert">
                    <h2 class="card-title fw-semibold mt-4 text-center">هيئة المحررين</h2>
                  </div>
                  <div class="col-4 my-4">
                    <label for="date_formation">تاريخ الهيئة</label>
                    @php
                        $dateCommission = App\Models\Commission::where('annee_commission', $annee_commissions)
                         ->where('id_statu',4)
                          ->value('date_commission');
                    @endphp
                    <input type="date"  name="date_commission[]"  class="form-control" id="date_commission" value="{{$dateCommission->format('Y-m-d')}}"/>
                  </div>
                  <div class="col-4 my-4">
                    <label for="participantes"> تاريخ القرار </label>
                    @php
                    $datearrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                     ->where('id_statu', 4)
                      ->value('date_arrete');
                @endphp
                    <input type="date"  name="date_arrete[]"  class="form-control" id="date_arrete"  value="{{$datearrete->format('Y-m-d')}}"/>
                </div>
                <div class="col-4 my-4">
                    <label for="participantes"> رقم القرار </label>
                    @php
                    $narrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                     ->where('id_statu', 4)
                      ->value('n_arrete');
                @endphp
                    <input type="number"  name="n_arrete[]"  class="form-control" id="date_formation"  value="{{$narrete}}"/>
                </div>
                <div class="alert alert-secondary" role="alert">
                    <h2 class="card-title fw-semibold mt-4 text-center">هيئة المساعدين التقنيين</h2>
                  </div>
                  <div class="col-4 my-4">
                    <label for="date_formation">تاريخ الهيئة</label>
                    @php
                        $dateCommission = App\Models\Commission::where('annee_commission', $annee_commissions)
                         ->where('id_statu', 5)
                          ->value('date_commission');
                    @endphp
                    <input type="date"  name="date_commission[]"  class="form-control" id="date_commission" value="{{$dateCommission->format('Y-m-d')}}"/>
                  </div>
                  <div class="col-4 my-4">
                    <label for="participantes"> تاريخ القرار </label>
                    @php
                    $datearrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                     ->where('id_statu', 5)
                      ->value('date_arrete');
                @endphp
                    <input type="date"  name="date_arrete[]"  class="form-control" id="date_arrete"  value="{{$datearrete->format('Y-m-d')}}"/>
                </div>
                <div class="col-4 my-4">
                    <label for="participantes"> رقم القرار </label>
                    @php
                    $narrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                     ->where('id_statu', 5)
                      ->value('n_arrete');
                @endphp
                    <input type="number"  name="n_arrete[]"  class="form-control" id="date_formation"  value="{{$narrete}}"/>
                </div>
                <div class="alert alert-secondary" role="alert">
                  <h2 class="card-title fw-semibold mt-4 text-center">هيئة المساعدين الإداريين</h2>
                </div> <div class="col-4 my-4">
                    <label for="date_formation">تاريخ الهيئة</label>
                    @php
                        $dateCommission = App\Models\Commission::where('annee_commission', $annee_commissions)
                         ->where('id_statu', 6)
                          ->value('date_commission');
                    @endphp
                    <input type="date"  name="date_commission[]"  class="form-control" id="date_commission" value="{{$dateCommission->format('Y-m-d')}}"/>
                  </div>
                  <div class="col-4 my-4">
                    <label for="participantes"> تاريخ القرار </label>
                    @php
                    $datearrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                     ->where('id_statu', 6)
                      ->value('date_arrete');
                @endphp
                    <input type="date"  name="date_arrete[]"  class="form-control" id="date_arrete"  value="{{$datearrete->format('Y-m-d')}}"/>
                </div>
                <div class="col-4 my-4">
                    <label for="participantes"> رقم القرار </label>
                    @php
                    $narrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                     ->where('id_statu', 6)
                      ->value('n_arrete');
                @endphp
                    <input type="number"  name="n_arrete[]"  class="form-control" id="date_formation"  value="{{$narrete}}"/>
                </div>
              <div class="alert alert-secondary" role="alert">
                <h2 class="card-title fw-semibold mt-4 text-center">هيئة المهندسين</h2>
                </div>
                <div class="col-4 my-4">
                    <label for="date_formation">تاريخ الهيئة</label>
                    @php
                        $dateCommission = App\Models\Commission::where('annee_commission', $annee_commissions)
                         ->where('id_statu', 7)
                          ->value('date_commission');
                    @endphp
                    <input type="date"  name="date_commission[]"  class="form-control" id="date_commission" value="{{$dateCommission->format('Y-m-d')}}"/>
                  </div>
                  <div class="col-4 my-4">
                    <label for="participantes"> تاريخ القرار </label>
                    @php
                    $datearrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                     ->where('id_statu', 7)
                      ->value('date_arrete');
                @endphp
                    <input type="date"  name="date_arrete[]"  class="form-control" id="date_arrete"  value="{{$datearrete->format('Y-m-d')}}"/>
                </div>
                <div class="col-4 my-4">
                    <label for="participantes"> رقم القرار </label>
                    @php
                    $narrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                     ->where('id_statu', 7)
                      ->value('n_arrete');
                @endphp
                    <input type="number"  name="n_arrete[]"  class="form-control" id="date_formation"  value="{{$narrete}}"/>
                </div>
              <div class="alert alert-secondary" role="alert">
                <h2 class="card-title fw-semibold mt-4 text-center">هيئة الممرضين وتقنيي الصحة</h2>
                </div> <div class="col-4 my-4">
                    <label for="date_formation">تاريخ الهيئة</label>
                    @php
                        $dateCommission = App\Models\Commission::where('annee_commission', $annee_commissions)
                         ->where('id_statu', 8)
                          ->value('date_commission');
                    @endphp
                    <input type="date"  name="date_commission[]"  class="form-control" id="date_commission" value="{{$dateCommission->format('Y-m-d')}}"/>
                  </div>
                  <div class="col-4 my-4">
                    <label for="participantes"> تاريخ القرار </label>
                    @php
                    $datearrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                     ->where('id_statu', 8)
                      ->value('date_arrete');
                @endphp
                    <input type="date"  name="date_arrete[]"  class="form-control" id="date_arrete"  value="{{$datearrete->format('Y-m-d')}}"/>
                </div>
                <div class="col-4 my-4">
                    <label for="participantes"> رقم القرار </label>
                    @php
                    $narrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                     ->where('id_statu', 8)
                      ->value('n_arrete');
                @endphp
                    <input type="number"  name="n_arrete[]"  class="form-control" id="date_formation"  value="{{$narrete}}"/>
                </div>
              <div>
              <h2 class="card-title fw-semibold mt-4 text-center">هيئة الاطباء والصيادلة  </h2>
            </div> <div class="col-4 my-4">
                <label for="date_formation">تاريخ الهيئة</label>
                @php
                    $dateCommission = App\Models\Commission::where('annee_commission', $annee_commissions)
                     ->where('id_statu', 9)
                      ->value('date_commission');
                @endphp
                <input type="date"  name="date_commission[]"  class="form-control" id="date_commission" value="{{$dateCommission->format('Y-m-d')}}"/>
              </div>
              <div class="col-4 my-4">
                <label for="participantes"> تاريخ القرار </label>
                @php
                $datearrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                 ->where('id_statu', 9)
                  ->value('date_arrete');
            @endphp
                <input type="date"  name="date_arrete[]"  class="form-control" id="date_arrete" value="{{$datearrete->format('Y-m-d')}}"/>
            </div>
            <div class="col-4 my-4">
                <label for="participantes"> رقم القرار </label>
                @php
                $narrete = App\Models\Commission::where('annee_commission', $annee_commissions)
                 ->where('id_statu', 9)
                  ->value('n_arrete');
            @endphp
                <input type="number"  name="n_arrete[]"  class="form-control" id="date_formation" value="{{$narrete}}"/>
            </div>







              </div>
            </div>

          </div>
          <div class="btnsimple text-start m-4 ">
            <button type="submit" class="btn btn-primary ">حفط المعلومــات</button>
          </div>
        </form>
        </div>
@endsection

