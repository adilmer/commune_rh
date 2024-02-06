@extends('templates.site')
@section('content')
<div class="card" style="direction: ltr">
    <form action="{{route('situationfamiliale.save_enfant')}}" enctype="multipart/form-data" method="post">
       @csrf
       @php
        if($agent==null)
           $agent = App\Models\Agent::where('id_agent', request()->query('id_agent'))->first();
       @endphp
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Nouveau enfant</h5>
            <div class="card">
              <div class="card-body">
                <div class="row">
                    <div class="col-12 ">
                        <label for="combo_agent" > Nom et prénom de l'agent :</label>
        <input class="form-control" list="agents_list" id="list_agents"  value="{{$agent->nom_fr ?? ''}}"  placeholder="chercher..." {{$agent != null ? 'disabled' : ''}}>
        <input type="hidden" class="form-control" id="id_agent" name="id_agent" placeholder=""  value="{{$agent->id_agent ?? ''}}" required>
        <datalist id="agents_list">
            @foreach ($agents as $agents)
            <option data-id="{{$agents->id_agent}}" value="{{$agents->nom_fr}}" >
            @endforeach
        </datalist>
                      </div>
                  <div class="col-6 mt-4 ">
                    <label for="id_conjoint" >Nom et prénom de conjont(e)  </label>
                    <input class="form-control" list="conjoints_list" id="list_conjoints"  value="{{$conjoint->nom_cj ?? ''}}"  placeholder="chercher..." {{$conjoint != null ? 'disabled' : ''}}>
                    <input type="hidden" class="form-control" id="id_conjoint" name="id_conjoint" placeholder=""  value="{{$conjoint->id_conjoint ?? ''}}" required>
                    <datalist id="conjoints_list">
                        @foreach ($conjoints as $conjoint)
                        <option data-id="{{$conjoint->id_conjoint}}" value="{{$conjoint->nom_cj}}" >
                        @endforeach
                    </datalist>
                  </div>
                  <div class="col-6  mt-4">
                    <label for="nom_enfant" >Nom et prénom de l'enfant </label>
                    <input type="text" class="form-control" id="nom_enfant" name="nom_enfant" >
                  </div>
                  <div class="col-6  mt-4">
                    <label for="date_effet">date de naissance </label>
                    <input name="date_naiss" type="date" class="form-control" id="date_naiss" placeholder="">
                  </div>
                  <div class="col-6  mt-4">
                    <label for="status_enfant" >Status de l'enfant </label>
                    <input type="text" class="form-control" id="status_enfant" name="status_enfant" placeholder="Hadana,Infirmité,Arrêt sur demande,Décès enfant...">
                  </div>
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
@section('script')
list_agents.addEventListener('change', getIdAgent);
    function getIdAgent() {
        var input = document.getElementById("list_agents");
        var selectedOption = document.querySelector("#agents_list option[value='" + input.value + "']");

        if (selectedOption) {
          var id_agent = selectedOption.getAttribute("data-id");
          $("#id_agent").val(id_agent);
          var newQueryString = '?id_agent='+id_agent;
          var newUrl = window.location.href.split('?')[0] + newQueryString;
          window.location.href = newUrl;
        }
      }

      list_conjoints.addEventListener('change', getIdconjoint);
    function getIdconjoint() {
        var input = document.getElementById("list_conjoints");
        var selectedOption = document.querySelector("#conjoints_list option[value='" + input.value + "']");

        if (selectedOption) {
          var id_conjoint = selectedOption.getAttribute("data-id");
          $("#id_conjoint").val(id_conjoint);

        }
      }
@endsection
