@extends('templates.site')
@section('content')
<div class="container">


    <div class="card">
        <form action="{{route('conge.update')}}" method="post">
        @csrf
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4"> طلب رخصة </h5>
        <div class="row">
          <div class="col-7">
            <div class="row">
              <div class="col-12 mt-4">
                <label for="combo_agent" >الإسم الكامل   </label>
                <input type="text" class="form-control" placeholder="" value="{{$conge->agent->nom_ar}}" disabled>
                <input type="hidden" class="form-control" id="id_agent" name="id_agent" placeholder="" value="{{$conge->id_agent}}" >
                <input type="hidden" class="form-control" id="id_conge" name="id_conge" placeholder="" value="{{$conge->id_conge}}" >
              </div>
              <div class="col-6 mt-4">
                <label for="type_conge" >نوع الرخصة</label>
                <select class="form-select"  value="{{$conge->type_conge}}" name="type_conge" id="combo_agent"   aria-label="Default select example">
                  <option value="سنوية" selected>سنوية</option>
                  <option value="إستثنائية">إستثنائية</option>
                  <option value="الولادة">الولادة</option>
                  <option value="الأبوة">الأبوة</option>
                </select>
              </div>
              <div class="col-6 mt-4">
                <label for="annee_conge" >برسم سنة </label>
                <input type="number" class="form-control" id="annee_conge"  value="{{$conge->annee_conge}}" name="annee_conge" placeholder="">
              </div>
              <div class="col-6 mt-4">
                <label for="nbr_jours" >عدد الأيام</label>
                <input type="number" class="form-control" id="nbr_jours"  value="{{$conge->nbr_jours}}" name="nbr_jours" placeholder="">
              </div>
              <div class="col-6 mt-4">
                <label for="date_debut_conge" >تاريخ بداية الرخصة </label>
                <input type="date" class="form-control" id="date_debut_conge"  value="{{$conge->date_debut_conge->format('Y-m-d')}}" name="date_debut_conge" placeholder="">
              </div>
              <div class="col-6 mt-4">
                <label for="date_fin_conge" >تاريخ نهاية الرخصة </label>
                <input type="date" class="form-control" id="date_fin_conge"  value="{{$conge->date_fin_conge->format('Y-m-d')}}" name="date_fin_conge" placeholder="">
              </div>
              <div class="col-6 mt-4">
                <label for="date_prise" >تاريخ إستئناف العمل </label>
                <input type="date" class="form-control" id="date_prise"  value="{{$conge->date_prise->format('Y-m-d')}}" name="date_prise" placeholder="">
              </div>
              <div class="col-6 mt-4">
                <label for="remplacant" >  ينوب عنه </label>
                <input type="text" class="form-control" id="remplacant"  value="{{$conge->remplacant}}" name="remplacant" placeholder="">
              </div>
              <div class="col-6 mt-4">
                <label for="adresse_conge" >العنوان خلال الإجازة   </label>
                <input type="text" class="form-control" id="adresse_conge"  value="{{$conge->adresse_conge}}" name="adresse_conge" placeholder="">
              </div>
            </div>
          </div>
          <div class="col-5  bg-light p-3">
            <div class="col-12">
              <h5 class="card-title fw-semibold  mb-4">أرشيف الرخص </h5>
            </div>
            <div class="col-12">
              <div class="table-responsive">
                <table class="table table-striped text-nowrap mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>

                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">تاريخ بداية الرخصة</h6>
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
                  </thead>
                  <tbody>
                    @foreach ($conges as $conges)


                    <tr>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{$conges->date_debut_conge->format('Y-m-d')}}</p>
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
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="btnsimple text-start m-4 ">
        <button type="submit" class="btn btn-primary ">تعديل المعلومــات</button>
      </div>
    </form>
    </div>

</div>
@endsection
