@extends('templates.site')
@section('content')
<div class="row my-2" style="justify-content: flex-end;">
    @php

$agent_bq = App\Models\Agent::where('id_agent',request()->query('id_agent'))->first();
$agents_bq = App\Models\Conjoint::all();

       @endphp
          <div class="col-sm-3 pl-0 ">
            <input class="form-control" list="agents_list" id="list_agents" value="{{$agent_bq->nom_fr ?? ''}}"  placeholder="بحث..." autocomplete="off" >
            <input type="hidden" class="form-control" id="id_agent" name="id_agent" placeholder="" value="{{$agent_bq->id_agent ?? ''}}">
            <datalist id="agents_list">
                @foreach ($agents_bq as $agents_bq)
                <option data-id="{{$agents_bq->id_agent}}" value="{{$agents_bq->agent->nom_fr}}" >
                @endforeach
            </datalist>
        </div>
          <div class="col-sm-4 ">
            <a href="{{route('situationfamiliale.create')}}" class="btn btn-primary"><i class="ti ti-user-plus"></i>Nouveau conjoint(e)</a>
            <a href="{{route('situationfamiliale.create_enfant')}}" class="btn btn-success"><i class="ti ti-user-plus"></i>Nouveau enfant</a>

        </div>

            <div class="row">
              <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                  <div class="card-body p-4" style="direction: ltr">
                    <h5 class="card-title fw-semibold mb-4 text-left">Liste des conjoint(e)s </h5>
                    <div class="table-responsive">
                      <table class="table table-bordered table-light text-nowrap mb-0 align-middle text-center" >
                        <thead class="text-dark fs-4 table-info">
                          <tr>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Nom de l'agent</h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Nom(s) de(s) conjoint(e)s</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Motif d'effet</h6>
                              </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Date d'effet</h6>
                              </th>
                              <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nom(s) de(s) enfant(s)</h6>
                              </th>
                              <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Date de naissance</h6>
                              </th>
                              <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Status de l'enfant</h6>
                              </th>

                          </tr>
                        </thead>
                        <tbody id="table_enfants">
                            @if (request()->query('id_agent'))
                            @php
                            $agent = App\Models\Agent::where('id_agent',request()->query('id_agent'))->first();
                                $conjoints = App\Models\Conjoint::where('id_agent',$agent->id_agent)->get();
                            @endphp
                            @if($conjoints->count()>0)
                            <tr>
                                <td class="border-bottom-0" rowspan="{{$conjoints->count()}}" >
                                  <h6 class="fw-semibold mb-0">{{$agent->nom_fr}}
                                    <span  >
                                        <a class="btn btn-sm btn-primary fs-1 mx-2 rounded-2" href="{{route('situationfamiliale.create',$agent->id_agent)}}">
                                        <i class="ti ti-plus"></i></a>
                                    </span>
                                </h6>
                                </td>
                            @foreach ($conjoints as $conjoint)

                            <td class="border-bottom-0 ">
                                <h6 class="mb-0 fw-semibold"><a href="{{route('situationfamiliale.details',$conjoint->id_conjoint)}}">{{strtoupper($conjoint->nom_cj)}}</a>
                                    <span  >
                                        <a  class="btn btn-sm btn-success fs-1 mx-2  rounded-2" href="{{route('situationfamiliale.create_enfant',$conjoint->id_conjoint)}}">
                                        <i class="ti ti-plus"></i></a>
                                    </span>
                                    <p class="mb-0 fw-semibold ">{{strtoupper($conjoint->cin_cj)}} <span class="mx-3 "></span></p>
                                </h6>


                              </td>
                              <td class="border-bottom-0">
                                <p class="mb-0 fw-semibold">{{strtoupper($conjoint->status_conjoint)}}</p>
                              </td>

                                <td class="border-bottom-0">
                                  <p class="mb-0 fw-semibold">{{$conjoint->date_effet->format('d/m/Y')}}</p>
                                </td>
                                @php
                                $enfants = App\Models\Enfant::where('id_conjoint',$conjoint->id_conjoint)->get();
                                @endphp

                                 <td class="border-bottom-0">
                                    @foreach ($enfants as $enfant)
                                     <p class="mb-0 fw-semibold"><a href="{{route('situationfamiliale.details_enfant',$enfant->id_enfant)}}">{{strtoupper($enfant->nom_enfant)}}</a></p>
                                     @endforeach
                                     @if ($enfants->count() ==0)
                                     <p class="mb-0 fw-semibold text-primary">SANS</p>
                                  @endif
                                    </td>
                                    <td class="border-bottom-0">
                                        @foreach ($enfants as $enfant)
                                         <p class="mb-0 fw-semibold">{{$enfant->date_naiss->format('d/m/Y')}}</p>
                                         @endforeach
                                         @if ($enfants->count() ==0)
                                         <p class="mb-0 fw-semibold"> - </p>
                                         @endif
                                        </td>
                                        <td class="border-bottom-0">
                                            @foreach ($enfants as $enfant)
                                             <p class="mb-0 fw-semibold">{{$enfant->status_enfant == '' ? 'SANS' : strtoupper($enfant->status_enfant)}}</p>
                                             @endforeach
                                             @if ($enfants->count() ==0)
                                             <p class="mb-0 fw-semibold"> - </p>
                                             @endif
                                            </td>
                              </tr>
                            @endforeach
                            @endif

                            @else

                            @foreach ($agents as $agent)

                            @php
                                $conjoints = App\Models\Conjoint::where('id_agent',$agent->id_agent)->get();
                            @endphp
                            @if($conjoints->count()>0)
                            <tr>
                                <td class="border-bottom-0" rowspan="{{$conjoints->count()}}" >
                                  <h6 class="fw-semibold mb-0">{{$agent->nom_fr}}
                                    <span  >
                                        <a class="btn btn-sm btn-primary fs-1 mx-2 rounded-2" href="{{route('situationfamiliale.create',$agent->id_agent)}}">
                                        <i class="ti ti-plus"></i></a>
                                    </span>
                                </h6>
                                </td>
                            @foreach ($conjoints as $conjoint)

                            <td class="border-bottom-0 ">
                                <h6 class="mb-0 fw-semibold"><a href="{{route('situationfamiliale.details',$conjoint->id_conjoint)}}">{{strtoupper($conjoint->nom_cj)}}</a>
                                    <span  >
                                        <a  class="btn btn-sm btn-success fs-1 mx-2  rounded-2" href="{{route('situationfamiliale.create_enfant',$conjoint->id_conjoint)}}">
                                        <i class="ti ti-plus"></i></a>
                                    </span>
                                    <p class="mb-0 fw-semibold ">{{strtoupper($conjoint->cin_cj)}} <span class="mx-3 "></span></p>
                                </h6>


                              </td>
                              <td class="border-bottom-0">
                                <p class="mb-0 fw-semibold">{{strtoupper($conjoint->status_conjoint)}}</p>
                              </td>

                                <td class="border-bottom-0">
                                  <p class="mb-0 fw-semibold">{{$conjoint->date_effet->format('d/m/Y')}}</p>
                                </td>
                                @php
                                $enfants = App\Models\Enfant::where('id_conjoint',$conjoint->id_conjoint)->get();
                                @endphp

                                 <td class="border-bottom-0">
                                    @foreach ($enfants as $enfant)
                                     <p class="mb-0 fw-semibold"><a href="{{route('situationfamiliale.details_enfant',$enfant->id_enfant)}}">{{strtoupper($enfant->nom_enfant)}}</a></p>
                                     @endforeach
                                     @if ($enfants->count() ==0)
                                     <p class="mb-0 fw-semibold text-primary">SANS</p>
                                  @endif
                                    </td>
                                    <td class="border-bottom-0">
                                        @foreach ($enfants as $enfant)
                                         <p class="mb-0 fw-semibold">{{$enfant->date_naiss->format('d/m/Y')}}</p>
                                         @endforeach
                                         @if ($enfants->count() ==0)
                                         <p class="mb-0 fw-semibold"> - </p>
                                         @endif
                                        </td>
                                        <td class="border-bottom-0">
                                            @foreach ($enfants as $enfant)
                                             <p class="mb-0 fw-semibold">{{$enfant->status_enfant == '' ? 'SANS' : strtoupper($enfant->status_enfant)}}</p>
                                             @endforeach
                                             @if ($enfants->count() ==0)
                                             <p class="mb-0 fw-semibold"> - </p>
                                             @endif
                                            </td>
                              </tr>
                            @endforeach
                            @endif

                          @endforeach
                        @endif
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
@endsection
