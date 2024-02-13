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
            <h5 class="card-title fw-semibold mb-4">Avancement Echelle </h5>
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
                    Grade : <span class='text-bold mx-2  px-1'>{{$agent->grade->nom_grade_fr ?? ''}}</span>
                    <br>Echellon : <span class='text-bold mx-2  px-1'>{{$agent->echellon ?? ''}}</span>
                    Date d'effet Echellon : <span class='text-bold mx-2  px-1'>{{$agent->date_echellon->format('Y/m/d') ?? ''}} </span>
                    Echelle : <span class='text-bold mx-2  px-1'>{{$agent->echelle ?? ''}}</span>
                    Date d'effet Grade : <span class='text-bold mx-2  px-1'>{{$agent->date_grade->format('Y/m/d') ?? ''}} </span>
                </p>

              </div>

            <div class="row">
              <div class="col-6 mt-3">
                <h3 class="text-center">Ancienne Situation</h3>
                <table class="table table-striped text-nowrap">
                    <tr>
                        <th>Echellon</th>
                        <th>Grade</th>
                        <th>Date d'effet Grade</th>
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
                          @php
                            $nom_grade = $agent->grade->nom_grade_fr;
                            $text = explode(" ",$nom_grade);
                            $text_grade = $text[0];
                            if($text[0]=="adjoint"){
                                $text_grade = $text[0] ." ".$text[1];
                            }

                              $grade_list = App\Models\Grade::where('nom_grade_fr','like','%'.$text_grade.'%')->get();
                          @endphp
                        <td><select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            @foreach ($grade_list as $Grades)
                            <option  {{$Grades->id_grade==$agent->id_grade ? "selected" : ""}}>{{$Grades->nom_grade_fr}}</option>
                            @endforeach


                          </select></td>
                          @php
                          $agente = App\Models\Agent::where('id_agent',request()->query('id_agent'))->first() ?? false;
                          $newAgent0 = app('App\Http\Controllers\AvancementController')->newAgent($agente,null,request()->query('echellon')) ?? null;
                          //dd($agente,$newAgent0);
                          $new_echellon0 = $newAgent0->echellon;
                          $new_indice0 = $newAgent0->indice;
                          $new_date_grade0 = $newAgent0->date_grade->format('Y-m-d');

                          //dd($new_echellon,$new_indice,$new_date_echellon);

                      @endphp
                          @if($new_indice0 !=0)

                        <td><input class="form-control" type="text" value="{{$new_date_grade0 ?? ''}}"></td>
                        @else
                        <td><input class="form-control" type="text" value="" disabled></td>
                        <td><input class="form-control" type="text" value="" disabled></td>
                        @endif

                    </tr>
                </table>
              </div>

            @php
                $agentt = App\Models\Agent::where('id_agent',request()->query('id_agent'))->first() ?? false;
                $echelle  = $agentt->echelle + 1 ?? null;
                $newAgent = app('App\Http\Controllers\AvancementController')->newAgent($agentt,null, $echellon - 1 ) ?? null;
                $new_echellon = $newAgent->echellon;
                $new_date_echellon = $newAgent->date_echellon->format('Y-m-d');
            @endphp
              <div class="col-5 mt-3">
                <h3 class="text-center">Nouvelle Situation</h3>
                <table class="table table-striped text-nowrap">
                    <tr>
                        <th>Echellon</th>
                        <th>Echelle</th>
                        <th>Date d'effet echellon</th>
                    </tr>
                    <tr>

                        <td><select class="form-select" id="echellonSelect"  aria-label="Floating label select example">

                            <option  {{$new_echellon=="1" ? "selected" : ""}}>1</option>
                            <option  {{$new_echellon=="2" ? "selected" : ""}}>2</option>
                            <option  {{$new_echellon=="3" ? "selected" : ""}}>3</option>
                            <option  {{$new_echellon=="4" ? "selected" : ""}}>4</option>
                            <option  {{$new_echellon=="5" ? "selected" : ""}}>5</option>
                            <option  {{$new_echellon=="6" ? "selected" : ""}}>6</option>
                            <option  {{$new_echellon=="7" ? "selected" : ""}}>7</option>
                            <option  {{$new_echellon=="8" ? "selected" : ""}}>8</option>
                            <option  {{$new_echellon=="9" ? "selected" : ""}}>9</option>
                            <option  {{$new_echellon=="10" ? "selected" : ""}}>10</option>
                            <option  {{$new_echellon=="exp" ? "selected" : ""}}>exp</option>


                          </select></td>
                        <td><select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            @foreach ($grade_list as $Grades)
                            <option  {{$Grades->id_grade==$agent->id_grade-1 ? "selected" : ""}}>{{$Grades->nom_grade_fr}}</option>
                            @endforeach


                          </select></td>
                        <td><input type="date" class="form-control" value="{{$agent->date_grade->addYear(5)->format('Y-m-d')}}" ></td>

                    </tr>
                </table>
              </div>

            <div class="btnsucc m-4 text-end">
              <button type="submit" id="btn_submit" class="btn btn-success" ><i class="ti ti-printer"></i> طباعة القرارات </button>
              <a href="{{route('avancement.etat_engagement')}}?id_agent={{$agent->id_agent}}&old_echellon={{$echellon}}" target="_blank" class="btn btn-info" ><i class="ti ti-printer"></i> État D'engagement </a>
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
