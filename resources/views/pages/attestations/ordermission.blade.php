@extends('templates.site')
@section('content')
<div class="card" dir="ltr">
          <div class="card-body">
            <form action="{{route('attestation.export_word_ordermission')}}" method="get">
                @csrf

            <h5 class="card-title fw-semibold mb-4">Order de Mission</h5>
            <div class="form-group row  my-3">
              <div class="row">
              <div class="col-6 m-0">
                <label for="list_agents" >Type fonctionnaire : </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" onclick="checkradio()" id="inlineRadio1" value="Agents" checked>
                    <label class="form-check-label" for="inlineRadio1">Agents</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" onclick="checkradio()" id="inlineRadio2" value="Member " >
                    <label class="form-check-label" for="inlineRadio2">Member</label>
                  </div>
                <br><br>
                <input type="hidden" class="form-control" id="id_agent" name="id_agent" placeholder="" value="" required>
                <label for="list_agents" >Nom fonctionnaire : </label>
                <div id="dataagent">
                <input type="text" class="form-control" list="agents_list" id="list_agents"  autocomplete="off"  placeholder="Select fonctionnaire" value="" required >
              <datalist id="agents_list" >
                @foreach ($agents as $agents)
                <option data-id="{{$agents->id_agent}}" value="{{$agents->nom_fr}}" >
                @endforeach
             </datalist>
                </div>



            <div id="datamember" style="display: none">
                <input type="text" class="form-control" list="agents_list2" id="list_agents"  autocomplete="off"  placeholder="Select member" value="" required >
                <datalist id="agents_list2" >
                  @foreach ($members as $members)
                  <option data-id="{{$members->id_member}}" value="{{$members->nomfr_member}}" >
                  @endforeach
              </datalist>
            </div>





              </div>
              </div>

              <div class="col-sm-5 m-1" id="info_agent">

              </div>

            <div class="row">
              <div class="col-6 mt-3">
                <label for="nom_fils" >De se rendre à : </label>
                <input type="text" class="form-control"  id="nom_fils" name="ville" placeholder="Agadir..">
              </div>
              <div class="col-6 mt-3">
                <label for="date_naiss_fils">date de depart</label>
                <input  type="date" name="depart" class="form-control" id="date_naiss_fils" placeholder="">
              </div>
              <div class="col-6 mt-3">
                <label for="lieu_naiss_fils">date de retours</label>
                <input  name="retour" type="text" class="form-control" value="dès mission terminée" id="lieu_naiss_fils" placeholder="">
              </div>
              <div class="col-6 mt-3">
                <label for="n_acte_naiss" > moyen de transport</label>
                <input type="text" class="form-control" name="transport" id="n_acte_naiss"  placeholder="">
              </div>
              <div class="col-6 mt-3">
                <label for="class_fils">nature de la mission</label>
                <input class="form-control" list="datalistOptions" id="exampleDataList" name="mission" placeholder="Type to search...">
                    <datalist id="datalistOptions">
                        <option value="SERVIC">
                        <option value="FORMATION">
                        <option value="SERVICE FORMATION">
                    </datalist>
            </div>
            <div class="btnsucc m-4 text-end">
              <button type="submit" id="btn_submit" class="btn btn-success"  ><i class="ti ti-printer"></i> طباعة الوثائق </button>
            </div>
          </div>
        </div>
    </form>

      </div>
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
        $text = id_agent
        $url = "{{ route('attestation.find_allocationfamilial') }}"
        $("#info_agent").html("");
        get_table_ajax_find($text,$url,"#info_agent")
        $("#list_agents").attr("disabled",'');
        $("#btn_submit").show();
        }
      }

@endsection
