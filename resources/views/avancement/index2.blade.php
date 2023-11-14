@extends('templates.site')
@section('content')
    @php
        set_time_limit(0);
    @endphp
<div class="inputsearch row " style="justify-content: flex-end;">

  <div class="col-sm-6 pl-0 mb-2  ">
    @php
    $agents = App\Models\Agent::all();
    $agent_now = App\Models\Agent::where('id_agent', request()->query('id_agent'))->first() ?? null;
@endphp
    <input class="form-control" list="agents_list" id="list_agents" value="{{$agent_now->nom_ar ?? ''}}"  placeholder="بحث...">
<input type="hidden" class="form-control" id="id_agent" name="id_agent" placeholder="" value="{{request()->query('id_agent')}}" required>
<datalist id="agents_list">
    @php
        $agents = App\Models\Agent::all();
    @endphp
    @foreach ($agents as $agents)
    <option data-id="{{$agents->id_agent}}" value="{{$agents->nom_ar}}" >
    @endforeach
</datalist>
  </div>
  <div class="col-sm-3 pl-0 mb-2  ">

  </div>
  <div class="col-sm-2 ">
    <a href="{{route('agent.create')}}" class="btn btn-primary"><i class="ti ti-user-plus"></i> إضافة موظف</a>

  </div>

      <div class="row" >
        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="card w-100">

            <div class="card-body p-4">
                <button type="button" style="float:left" class="btn btn-sm btn-outline-success text-capitalize float-left btn-round" data-bs-toggle="modal"
                      data-bs-target="#modal-export_agent">
                      <i class="la la-download"></i>تحميل Excel
                  </button>
              <h5 class="card-title  fw-semibold mb-4">لائحة الموظفين</h5>


              </div>

              <div class="table ">
                <table class="table table-sm mb-0 align-middle text-center " style="direction: ltr;">
                  <thead class="text-dark fs-4 ">
                    <tr>

                      <th class="border-bottom-0 col-auto">
                        <h6 class="fw-semibold mb-0">MAT</h6>
                      </th>
                      <th class="border-bottom-0 col-1">
                        <h6 class="fw-semibold mb-0">PPR</h6>
                      </th>
                      <th class="border-bottom-0 ">
                        <h6 class="fw-semibold mb-0">Nom et Prénom</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Grade</h6>
                      </th>
                      <th class="border-bottom-0 col-auto">
                        <h6 class="fw-semibold mb-0">Echelle</h6>
                      </th>
                       <th class="border-bottom-0 col-auto">
                        <h6 class="fw-semibold mb-0">Ancien Echellon</h6>
                      </th>
                      <th class="border-bottom-0 col-auto">
                        <h6 class="fw-semibold mb-0">Date Ancien Echellon</h6>
                      </th>
                      <th class="border-bottom-0 col-auto">
                        <h6 class="fw-semibold mb-0"> Nouveau Echellon </h6>
                      </th>

                      <th class="border-bottom-0 col-auto">
                        <h6 class="fw-semibold mb-0">Date Nouveau Echellon  </h6>
                      </th>
                      <th class="border-bottom-0 col-1">
                        <h6 class="fw-semibold mb-0">Brut</h6>
                        <span>{{number_format($total_montant["total_brut"] , 2, '.', ' ') }}</span>
                      </th>
                      <th class="border-bottom-0 col-1">
                        <h6 class="fw-semibold mb-0">CMR</h6>
                        <span>{{number_format($total_montant["total_cmr"] , 2, '.', ' ') }}</span>
                      </th>
                      <th class="border-bottom-0 col-1">
                        <h6 class="fw-semibold mb-0">AMO</h6>
                        <span>{{number_format($total_montant["total_amo"] , 2, '.', ' ') }}</span>
                      </th>
                      <th class="border-bottom-0 col-1">
                        <h6 class="fw-semibold mb-0">Total</h6>
                        <span>{{number_format($total_montant["total"] , 2, '.', ' ') }}</span>
                      </th>
                      <th class="border-bottom-0 col-1">
                        <h6 class="fw-semibold mb-0">Détails</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody id="table_agents">
                      {{-- liste agents --}}
                      @foreach ($table_agents as $key =>$table_agent)
                        @php
                        $agent = App\Models\Agent::where('id_agent',request()->query('id_agent'))->first() ?? null;

                        if($agent==null){
                            $agent = App\Models\Agent::where('id_agent',$table_agent[0]->id_agent)->first();

                        }
                        //dd($agent,request()->query('id_grade'),$table_agent[0]->id_agent);
                        @endphp
                       {{--  @if ($table_agent[0]->id_agent == request()->query('id_agent')) --}}

                    <tr>

                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">{{$table_agent[0]->mat}}</h6>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal"><a href="{{route('agent.details',$table_agent[0]->id_agent)}}">{{$table_agent[0]->ppr}}</a> </p>
                      </td>
                      <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-1">{{$table_agent[0]->nom_fr}}</h6>
                          <span class="fw-normal">{{$table_agent[0]->nom_ar}}</span>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{$table_agent[0]->grade->nom_grade_fr}}</p>
                        <span class="fw-normal">{{$table_agent[0]->grade->nom_grade_ar}}</span>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{$table_agent[0]->echelle}}</p>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{$table_agent[0]->echellon}}</p>
                      </td>
                      <td class="border-bottom-0 pos col-sm-1">
                        <p class="mb-0 fw-normal">{{$table_agent[0]->date_echellon->format('Y-m-d')}}</p>
                      </td>

                      <td class="border-bottom-0 pos">
                        <p class="mb-0 fw-normal">{{$table_agent[count($table_agent)-2]->echellon}}</p>
                      </td>

                      <td class="border-bottom-0 pos col-sm-1">
                        <p class="mb-0 fw-normal">{{$table_agent[count($table_agent)-2]->date_echellon->format('Y-m-d')}}</p>
                      </td>
                      <td class="border-bottom-0 pos">
                        <p class="mb-0 fw-normal">{{ number_format($table_agent[count($table_agent)-2]->montant['total_brut'] ?? 0, 2, '.', ' ') }}</p>
                      </td>
                      <td class="border-bottom-0 pos">
                        <p class="mb-0 fw-normal">{{number_format($table_agent[count($table_agent)-2]->montant['total_cmr'] ?? 0, 2, '.', ' ') }}</p>
                      </td>
                      <td class="border-bottom-0 pos">
                        <p class="mb-0 fw-normal">{{number_format($table_agent[count($table_agent)-2]->montant['total_amo'] ?? 0, 2, '.', ' ') }}</p>
                      </td>
                      <td class="border-bottom-0 pos">
                        <p class="mb-0 fw-normal">{{number_format($table_agent[count($table_agent)-2]->montant['total'] ?? 0, 2, '.', ' ') }}</p>
                      </td>
                      <td class="border-bottom-0 pos">
                        <p class="mb-0 fw-normal"><button class="btn btn-sm btn-info"><i class="ti ti-eye"></i></button></p>
                      </td>
                    </tr>


                   {{--  @endif --}}
                    {{-- @if (request()->query('id_agent')==null)
                    <tr>

                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">{{$table_agent[0]->mat}}</h6>
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal"><a href="{{route('agent.details',$table_agent[0]->id_agent)}}">{{$table_agent[0]->ppr}}</a> </p>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$table_agent[0]->nom_fr}}</h6>
                            <span class="fw-normal">{{$table_agent[0]->nom_ar}}</span>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$table_agent[0]->grade->nom_grade_fr}}</p>
                          <span class="fw-normal">{{$table_agent[0]->grade->nom_grade_ar}}</span>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$table_agent[0]->echelle}}</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$table_agent[0]->echellon}}</p>
                        </td>
                        <td class="border-bottom-0 pos col-sm-1">
                            <p class="mb-0 fw-normal">{{$table_agent[0]->date_echellon->format('Y-m-d')}}</p>
                          </td>


                        <td class="border-bottom-0 pos">
                            <p class="mb-0 fw-normal">{{$table_agent[0][count($table_agent)-2]->echellon}}</p>
                          </td>

                          <td class="border-bottom-0 pos col-sm-1">
                            <p class="mb-0 fw-normal">{{$table_agent[0][count($table_agent)-2]->date_echellon->format('Y-m-d')}}</p>
                          </td>
                          <td class="border-bottom-0 pos">
                            <p class="mb-0 fw-normal">{{$table_agent[0][count($table_agent)-2]->montant['total_brut']}}</p>
                          </td>
                          <td class="border-bottom-0 pos">
                            <p class="mb-0 fw-normal">{{$table_agent[0][count($table_agent)-2]->montant['total_cmr']}}</p>
                          </td>
                          <td class="border-bottom-0 pos">
                            <p class="mb-0 fw-normal">{{$table_agent[0][count($table_agent)-2]->montant['total_amo']}}</p>
                          </td>
                          <td class="border-bottom-0 pos">
                            <p class="mb-0 fw-normal">{{$table_agent[0][count($table_agent)-2]->montant['total']}}</p>
                          </td>
                      </tr>
                      @endif --}}
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
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
          var newQueryString =
        '?id_agent='+id_agent;
            var newUrl = window.location.href.split('?')[0]
        + newQueryString;
        window.location.href = newUrl;
        }

      }


@endsection
