@extends('templates.site')
@section('content')
@php
$agent = App\Models\Agent::where('id_agent',request()->query('id_agent'))->first();
$echellon = request()->query('echellon') ?? $agent->echellon ?? '';
@endphp
<div class="card" dir="ltr">
          <div class="card-body">
            <form action="" method="get">
                @csrf
            <h5 class="card-title fw-semibold mb-4">Table Avancement </h5>
            <div class="form-group row  my-3">
              <div class="row">
              <div class="col-6 m-0">
                <input type="hidden" class="form-control" id="id_agent" name="id_agent" placeholder="" value="{{$agent->id_agent ?? ''}}" required>
                <label for="list_agents" >Nom fonctionnaire : </label>
                <input type="text" class="form-control" list="agents_list" id="list_agents"  autocomplete="off"  placeholder="Select fonctionnaire" value="{{$agent->nom_fr ?? ''}}" required >
              <datalist id="agents_list" >
                @foreach ($agents as $agent_req)
                <option data-id="{{$agent_req->id_agent}}" value="{{$agent_req->nom_fr}}" >
                @endforeach
                </datalist>
              </div>
              </div>
              @if($agent)
              <input id="echellon" class="form-control" type="hidden" value="{{$echellon ?? ''}}">
              <div class="col-sm-6 m-1" id="info_agent">
                <p>Nom et prénom :  <span class='text-bold mx-2  px-1' id='nom_ag'>{{ $agent->nom_fr ?? ''}}</span>
                   PPR : <span class='text-bold mx-2  px-1'>{{$agent->ppr ?? ''}}</span>
                    MAT : <span class='text-bold mx-2  px-1'>{{$agent->mat ?? ''}}</span>
                    Echellon : <span class='text-bold mx-2  px-1'>{{$agent->echellon ?? ''}}</span>
                    Date_chellon : <span class='text-bold mx-2  px-1'>{{$agent->date_echellon->format('Y/m/d') ?? ''}} </span>
                </p>

              </div>

            <div class="row">
              <div class="col-5 mt-3">
                <h3 class="text-center">Ancienne Situation</h3>
                <table class="table table-striped text-nowrap">
                    <tr>
                        <th>Echelle</th>
                        <th>Echellon</th>
                        <th>Indice</th>
                        <th>Date d'effet echellon</th>
                    </tr>
                    <tr>
                        <td><select class="form-select" id="echellonSelect"  aria-label="Floating label select example">

                            <option  {{$echellon=="1" ? "selected" : ""}}>1</option>
                            <option  {{$echellon=="2" ? "selected" : ""}}>2</option>
                            <option  {{$echellon=="3" ? "selected" : ""}}>3</option>
                            <option  {{$echellon=="4" ? "selected" : ""}}>4</option>
                            <option  {{$echellon=="5" ? "selected" : ""}}>5</option>
                            <option  {{$echellon=="6" ? "selected" : ""}}>6</option>
                            <option  {{$echellon=="7" ? "selected" : ""}}>7</option>
                            <option  {{$echellon=="8" ? "selected" : ""}}>8</option>
                            <option  {{$echellon=="9" ? "selected" : ""}}>9</option>
                            <option  {{$echellon=="10" ? "selected" : ""}}>10</option>
                            <option  {{$echellon=="exp" ? "selected" : ""}}>exp</option>


                          </select></td>
                        <td><select class="form-select" id="floatingSelect" aria-label="Floating label select example" disabled>

                            <option  {{$agent->echelle=="1" ? "selected" : ""}}>1</option>
                            <option  {{$agent->echelle=="2" ? "selected" : ""}}>2</option>
                            <option  {{$agent->echelle=="3" ? "selected" : ""}}>3</option>
                            <option  {{$agent->echelle=="4" ? "selected" : ""}}>4</option>
                            <option  {{$agent->echelle=="5" ? "selected" : ""}}>5</option>
                            <option  {{$agent->echelle=="6" ? "selected" : ""}}>6</option>
                            <option  {{$agent->echelle=="7" ? "selected" : ""}}>7</option>
                            <option  {{$agent->echelle=="8" ? "selected" : ""}}>8</option>
                            <option  {{$agent->echelle=="9" ? "selected" : ""}}>9</option>
                            <option  {{$agent->echelle=="10" ? "selected" : ""}}>10</option>
                            <option  {{$agent->echelle=="11" ? "selected" : ""}}>11</option>
                            <option  {{$agent->echelle=="H*E" ? "selected" : ""}}>H*E</option>
                          </select></td>
                          @php
                          $agente = App\Models\Agent::where('id_agent',request()->query('id_agent'))->first() ?? false;
                          $newAgent0 = app('App\Http\Controllers\AvancementController')->newAgent($agente,null,request()->query('echellon')) ?? null;
                          //dd($agente,$newAgent0);
                          $new_echellon0 = $newAgent0->echellon;
                          $new_indice0 = $newAgent0->indice;
                          $new_date_echellon0 = $newAgent0->date_echellon->format('Y-m-d');

                          //dd($new_echellon,$new_indice,$new_date_echellon);

                      @endphp
                          @if($new_indice0 !=0)
                        <td><input class="form-control" type="text" value="{{$new_indice0 ?? ''}}" disabled></td>
                        <td><input class="form-control" type="text" value="{{$new_date_echellon0 ?? ''}}" disabled></td>
                        @else
                        <td><input class="form-control" type="text" value="" disabled></td>
                        <td><input class="form-control" type="text" value="" disabled></td>
                        @endif

                    </tr>
                </table>
              </div>
              <div id="calculer_situation" class="col-2 d-flex align-items-center justify-content-center ">

            </div>
            @php
                $agentt = App\Models\Agent::where('id_agent',request()->query('id_agent'))->first() ?? false;
                $newAgent = app('App\Http\Controllers\AvancementController')->newAgent($agentt,null, $echellon + 1 ) ?? null;
                $new_echellon = $newAgent->echellon;
                $new_indice = $newAgent->indice;
                $new_date_echellon = $newAgent->date_echellon->format('Y-m-d');

                //dd($new_echellon,$new_indice,$new_date_echellon);

            @endphp
              <div class="col-5 mt-3">
                <h3 class="text-center">Nouvelle Situation</h3>
                <table class="table table-striped text-nowrap">
                    <tr>
                        <th>Echelle</th>
                        <th>Echellon</th>
                        <th>Indice</th>
                        <th>Date d'effet echellon</th>
                    </tr>
                    <tr>
                        @if($new_indice!=0)
                        <td>{{$agent->echelle ?? ''}}</td>
                        <td>{{$new_echellon ?? ''}}</td>
                        <td>{{$new_indice ?? ''}}</td>
                        <td>{{$new_date_echellon ?? ''}}</td>
                        @else
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                            @endif
                    </tr>
                </table>
            </div>

                <div class="row"><div class="col-3">   </div>
                    <div class="col-3">
                        <label for="list_agents" >Année : </label>
                        <input type="date" class="form-control"   >
                    </div>


                    <div class="col-3">
                        <label for="list_agents" >Grade : </label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="ADMINISTRATEUR" selected>ADMINISTRATEUR</option>
                            <option value="REDACTEUR ">REDACTEUR </option>
                            <option value="INFIRMIER">INFIRMIER</option>
                            <option value="INGENIEUR ">INGENIEUR </option>
                            <option value="ADJOINT TECHNIQUE ">ADJOINT TECHNIQUE </option>
                            <option value="ADJOINT ADMINISTRATIF ">ADJOINT ADMINISTRATIF </option>
                            <option value="TECHNICIEN ">TECHNICIEN </option>
                          </select>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" id="btn_submit" class="btn btn-primary" ><i class="ti ti-plus"></i> Ajouter au Tableau </button>
                </div>
                <table class="table  table-bordered border-dark mt-3">
                    <tr>
                        <th class="align-middle text-center table-bordered border-dark" rowspan="2"><h4>CIN</h4></th>
                        <th class="align-middle text-center table-bordered border-dark"  rowspan="2"><h4>Nom et Prenom</h4></th>
                        <th class="align-middle text-center table-bordered border-dark"  colspan="4"><h4>Ancienenne Sutiation</h4></th>
                        <th class="align-middle text-center table-bordered border-dark"  rowspan="2"><h4>Cote</h4></th>
                        <th class="align-middle text-center table-bordered border-dark"  colspan="4"><h4>Ancienenne Sutiation</h4></th>
                        <th class="align-middle text-center table-bordered border-dark"  rowspan="2"><h4>Avis de la commission</h4></th>

                    </tr>
                    <tr>
                        <th class="align-middle text-center table-light"><h5>Echelle</h5></th>
                        <th class="align-middle text-center table-light"><h5>Echelon</h5></th>
                        <th class="align-middle text-center table-light"><h5>Indice</h5></th>
                        <th class="align-middle text-center table-light"><h5>Date d'effet echellon</h5></th>
                        <th class="align-middle text-center table-light"><h5>Echelle</h5></th>
                        <th class="align-middle text-center table-light"><h5>Echelon</h5></th>
                        <th class="align-middle text-center table-light"><h5>Indice</h5></th>
                        <th class="align-middle text-center table-light"><h5>Date d'effet echellon</h5></th>
                    </tr>
                    <tr>

                        <td class="align-middle text-center">SH179390</td>
                        <td class="align-middle text-center">EL MERZOUGUI OUALID</td>
                        <td class="align-middle text-center">9</td>
                        <td class="align-middle text-center">1</td>
                        <td class="align-middle text-center">342</td>
                        <td class="align-middle text-center">01/10/2022</td>
                        <td class="align-middle text-center">36</td>
                        <td class="align-middle text-center">9</td>
                        <td class="align-middle text-center">2</td>
                        <td class="align-middle text-center">357</td>
                        <td class="align-middle text-center">01/10/2022</td>
                        <td class="align-middle text-center"></td>
                    </tr>
                </table>
















            <div class="btnsucc m-4 text-end">
              <button type="submit" id="btn_submit" class="btn btn-success" ><i class="ti ti-printer"></i> imprimer Table  </button>
            </div>
          </div>
          @endif
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
        $echellon = "";

        var newQueryString = '?id_agent='+id_agent+'&echellon='+$echellon;
        var newUrl = window.location.href.split('?')[0] + newQueryString;
        window.location.href = newUrl;
        $url = "{{ route('attestation.find_allocationfamilial') }}"
        $("#info_agent").html("");
        get_table_ajax_find($text,$url,"#info_agent")
        $("#list_agents").attr("disabled",'');
        $("#btn_submit").show();
        }
      }


      $("#echellonSelect").on('change', function(e) {
        $echellon = this.value;
        $id_agent = $("#id_agent").val();
        var newQueryString = '?id_agent='+$id_agent+'&echellon='+$echellon;
        var newUrl = window.location.href.split('?')[0] + newQueryString;
        window.location.href = newUrl;


      });
@endsection
