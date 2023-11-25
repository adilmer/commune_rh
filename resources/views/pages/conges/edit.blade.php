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
                <select class="form-select"  value="{{$conge->type_conge}}" name="type_conge" id="type_conge"   aria-label="Default select example">
                  <option {{$conge->type_conge=='سنوية' ? 'selected' : ''}} >سنوية</option>
                  <option {{$conge->type_conge=='إستثنائية' ? 'selected' : ''}}>إستثنائية</option>
                  <option {{$conge->type_conge=='الولادة' ? 'selected' : ''}}>الولادة</option>
                  <option {{$conge->type_conge=='الأبوة' ? 'selected' : ''}}>الأبوة</option>
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
                <input class="form-control" list="remplacants_list" value="{{$conge->remplacant}}" id="list_remplacants"  placeholder="بحث...">
                <input type="hidden" class="form-control" id="remplacant" name="remplacant" placeholder="" value="{{$conge->remplacant}}">
                <datalist id="remplacants_list">
                    @foreach ($agents2 as $agents2)
                    <option value="{{$agents2->nom_ar}}" >
                    @endforeach
                </datalist>
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
@section('script')

list_remplacants.addEventListener('change', getRemplacant);
    function getRemplacant() {
        var input = document.getElementById("list_remplacants");
        var selectedOption = document.querySelector("#remplacants_list option[value='" + input.value + "']");

        if (selectedOption) {
          var remplacant = selectedOption.getAttribute("value");
          $("#remplacant").val(remplacant);
        }
      }

var nbrJoursInput = document.getElementById('nbr_jours');
var dateDebutInput = document.getElementById('date_debut_conge');
var dateFinInput = document.getElementById('date_fin_conge');
var datePriseInput = document.getElementById('date_prise');
var typeCongeInput = document.getElementById('type_conge');


nbrJoursInput.addEventListener('input', calculateDateFin);
dateDebutInput.addEventListener('input', calculateDateFin);
typeCongeInput.addEventListener('change', calculateDateFin);
typeCongeInput.addEventListener('change', initialiseNbrJours);

function initialiseNbrJours() {
    if($('#type_conge').val()=='الولادة'){
        document.getElementById('nbr_jours').value = 98;
    }
    if($('#type_conge').val()=='الأبوة'){
        document.getElementById('nbr_jours').value = 15;
    }

}

function calculateDateFin() {

    var nbrJours = parseInt(nbrJoursInput.value);
    var dateDebut = new Date(dateDebutInput.value);
    if($('#type_conge').val()=='سنوية' || $('#type_conge').val()=='إستثنائية'){
    if (nbrJours && dateDebut) {
      var countDays = 1;
      var countDays_prise = 0;
      var dateIterator = new Date(dateDebut);
      var dateIterator_prise = new Date(dateDebut);

      while (countDays < nbrJours) {
        dateIterator.setDate(dateIterator.getDate() + 1);
        if (dateIterator.getDay() !== 0 && dateIterator.getDay() !== 6) {
          countDays++;
        }
      }
      while (countDays_prise < nbrJours) {
        dateIterator_prise.setDate(dateIterator_prise.getDate() + 1);
        if (dateIterator_prise.getDay() !== 0 && dateIterator_prise.getDay() !== 6) {
          countDays_prise++;
        }
      }


      var formattedDate = dateIterator.toISOString().split('T')[0];
      var formattedDate_prise = dateIterator_prise.toISOString().split('T')[0];

      dateFinInput.value = formattedDate;
      datePriseInput.value = formattedDate_prise;
    }
  }else{
    if (nbrJours && dateDebut) {
        var dateFin = new Date(dateDebut);
        var datePrise = new Date(dateDebut);
        dateFin.setDate(dateFin.getDate() + nbrJours -1);
        datePrise.setDate(datePrise.getDate() + nbrJours);

        var formattedDate = dateFin.toISOString().split('T')[0];
        var formattedDate_prise = datePrise.toISOString().split('T')[0];


        dateFinInput.value = formattedDate;
        datePriseInput.value = formattedDate_prise;
    }



  }
}
@endsection
