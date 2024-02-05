@extends('templates.site')
@section('content')
<div class="row my-2" style="justify-content: flex-end;">
          <div class="col-sm-3 pl-0 ">
            <input type="text" id="txt_cherch" class="form-control  " placeholder="بحث ..." aria-label="Recipient's username" aria-describedby="button-addon2">
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
                                <h6 class="fw-semibold mb-0">date d'effet</h6>
                              </th>
                              <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nom(s) de(s) enfant(s)</h6>
                              </th>
                              <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">date de naissance</h6>
                              </th>


                          </tr>
                        </thead>
                        <tbody id="table_enfants">
                            @foreach ($agents as $agent)
                            @php
                                $conjoints = App\Models\Conjoint::where('id_agent',$agent->id_agent)->get();
                            @endphp
                            @if($conjoints->count()>0)
                            <tr>
                                <td class="border-bottom-0" rowspan="{{$conjoints->count()}}" >
                                  <h6 class="fw-semibold mb-0">{{$agent->nom_fr}}
                                    <span class="btn btn-sm btn-primary fs-1 mx-2 rounded-2" >
                                        <a href="{{route('situationfamiliale.create',$agent->id_agent)}}"></a>
                                        <i class="ti ti-plus"></i></a>
                                    </span>
                                </h6>
                                </td>
                            @foreach ($conjoints as $conjoint)

                            <td class="border-bottom-0 ">
                                <h6 class="mb-0 fw-semibold"><a href="{{route('situationfamiliale.details',$conjoint->id_conjoint)}}">{{strtoupper($conjoint->nom_cj)}}</a>
                                    <span class="btn btn-sm btn-success fs-1 mx-2  rounded-2" >
                                        <a href="{{route('situationfamiliale.create_enfant',$conjoint->id_conjoint)}}"></a>
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
                                     <p class="mb-0 fw-semibold"><a href="{{route('situationfamiliale.details',$enfant->id_enfant)}}">{{strtoupper($enfant->nom_enfant)}}</a></p>
                                     <p class="mb-0 fw-semibold">{{strtoupper($enfant->status_enfant)}}</p>
                                     @endforeach
                                     @if ($enfants->count() ==0)
                                     <p class="mb-0 fw-semibold text-primary">Sans</p>
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
                              </tr>
                            @endforeach
                            @endif

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
    $url = "{{ route('formation.filter') }}"
    $("#table_enfants").html("");
    get_table_ajax_find($text,$url,"#table_enfants")

    });
@endsection
