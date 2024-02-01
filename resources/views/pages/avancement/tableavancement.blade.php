@extends('templates.site')
@section('content')
@php
$agents = App\Models\Agent::get();
//$echellon = request()->query('echellon') ?? $agent->echellon ?? '';
@endphp
<div class="card" dir="ltr">
          <div class="card-body">
            <form action="{{route('avancement.exporttableavancement')}}" target="_blank" method="get">
                @csrf
            <h5 class="card-title fw-semibold mb-4">Table Avancement </h5>
            <div class="form-group row  my-3">
            @php
               /*  $agentt = App\Models\Agent::where('id_agent',request()->query('id_agent'))->first() ?? false;
                $newAgent = app('App\Http\Controllers\AvancementController')->newAgent($agentt,null, $echellon + 1 ) ?? null;
                $new_echellon = $newAgent->echellon;
                $new_indice = $newAgent->indice;
                $new_date_echellon = $newAgent->date_echellon->format('Y-m-d'); */

                //dd($new_echellon,$new_indice,$new_date_echellon);

            @endphp


                <div class="row"><div class="col-3"></div>
                    <div class="col-3">
                        <label for="list_agents" >Année : </label>
                        <input type="number" min="2023" value="{{date('Y')}}" step="1" class="form-control" name="annee"   >
                    </div>


                    <div class="col-3">
                        <label for="list_agents" >Grade : </label>
                        <select class="form-select" name="grade" aria-label="Default select example">
                            <option value="ADMINISTRATEUR" selected>ADMINISTRATEUR</option>
                            <option value="REDACTEUR ">REDACTEUR </option>
                            <option value="INFIRMIER">INFIRMIER</option>
                            <option value="INGENIEUR ">INGENIEUR </option>
                            <option value="ADJOINT TECHNIQUE ">ADJOINT TECHNIQUE </option>
                            <option value="ADJOINT ADMINISTRATIF ">ADJOINT ADMINISTRATIF </option>
                            <option value="TECHNICIEN ">TECHNICIEN </option>
                          </select>

                    </div>
                        <div class="col-2">
                            <label for=""></label>
                            <button  class="btn btn-success form-control">
                                <i class="ti ti-download p-0"></i>
                                 تحميل لائحة المترقين
                            </button>
                        </div>

                </div>

                <table class="table  table-bordered border-dark mt-3">
                    <tr>
                        <th class="align-middle text-center table-bordered border-dark"  rowspan="2"><h4>Nom et Prénom</h4></th>
                        <th class="align-middle text-center table-bordered border-dark"  colspan="4"><h4>Situation Actuelle</h4></th>
                        <th class="align-middle text-center table-bordered border-dark"  colspan="1"><h4>Ancienne Situation</h4></th>
                        <th class="align-middle text-center table-bordered border-dark"  colspan="1"><h4>Nouvelle Situation</h4></th>

                    </tr>
                    <tr>
                        <th class="align-middle text-center table-light"><h5>Echelle</h5></th>
                        <th class="align-middle text-center table-light"><h5>Echelon</h5></th>
                        <th class="align-middle text-center table-light"><h5>Indice</h5></th>
                        <th class="align-middle text-center table-light"><h5>Date d'effet Echellon</h5></th>
                        <th class="align-middle text-center table-light"><h5>Ancien Echellon</h5></th>
                        <th class="align-middle text-center table-light"><h5>Nouveau Echellon</h5></th>
                    </tr>
                    <tr>
                        <td class="align-middle text-center">
                            <select name="id_agent[]" id="0" class="form-select">
                                @foreach ($agents as $agent)
                                <option value="{{$agent->id_agent}}">{{$agent->nom_fr}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td id="echelle0" class="align-middle text-center">9</td>
                        <td id="echellon0" class="align-middle text-center">1</td>
                        <td id="indice0" class="align-middle text-center">342</td>
                        <td id="date_echellon0" class="align-middle text-center">01/10/2022</td>

                        <td class="align-middle text-center">
                            <select class="form-select" id="echellonSelect0" name="echellon[]"  aria-label="Floating label select example">
                            <option >1</option>
                            <option >2</option>
                            <option >3</option>
                            <option >4</option>
                            <option >5</option>
                            <option >6</option>
                            <option >7</option>
                            <option >8</option>
                            <option >9</option>
                            <option >10</option>
                            <option >exp</option>
                          </select>
                        </td>
                        <td class="align-middle text-center">
                            <select class="form-select" id="newechellonSelect0" name="new_echellon[]"  aria-label="Floating label select example">
                                <option >1</option>
                                <option >2</option>
                                <option >3</option>
                                <option >4</option>
                                <option >5</option>
                                <option >6</option>
                                <option >7</option>
                                <option >8</option>
                                <option >9</option>
                                <option >10</option>
                                <option >exp</option>
                              </select>
                        </td>
                    </tr>

                </table>
                <button type="button" id="addRowBtn" class="btn btn-sm btn-info col-3">+</button>
            <div class="btnsucc m-4 text-end">
              <button type="submit" name="print" id="btn_submit" class="btn btn-primary" ><i class="ti ti-printer"></i> imprimer Table  </button>
            </div>
          </div>
        </div>
    </form>

      </div>
        </div>
@endsection

@section('script')

$(document).on('change', 'select[name="id_agent[]"]', function (e) {
        var index = $(this).attr('id');
        var id_agent = this.value;
        $text = id_agent;
        $url = "{{ route('avancement.getinfoAgent') }}"
        get_table_ajax_array($text,$url,"#info0").done(function (success) {
            $echelle = success.data.echelle;
            $echellon = success.data.echellon;
            $indice = success.data.indice;
            $date_echellon = success.data.date_echellon;
            $("#echelle"+index).text($echelle);
            $("#echellon"+index).text($echellon);
            $("#indice"+index).text($indice);
            $("#date_echellon"+index).text($date_echellon);
            $("#echellonSelect"+index).val($echellon);
            if($echellon!=10)
            $("#newechellonSelect"+index).val($echellon+1);
            else
            $("#newechellonSelect"+index).val("exp");
        })
        .fail(function (reject) {
            console.error('Error:', reject);
            // Handle error here
        });


      });

      $("#addRowBtn").click(function () {
        var newRow = $("table tr:last").clone();

        newRow.find("select").attr("id", "");
        newRow.find("td").removeAttr("id");

        var newIndex = $("table tr").length-2;
        newRow.find("select").eq(0).attr("id", newIndex);
        newRow.find("td").eq(1).attr("id", "echelle" + newIndex);
        newRow.find("td").eq(2).attr("id", "echellon" + newIndex);
        newRow.find("td").eq(3).attr("id", "indice" + newIndex);
        newRow.find("td").eq(4).attr("id", "date_echellon" + newIndex);
        newRow.find("select").eq(1).attr("id", "echellonSelect" + newIndex);
        newRow.find("select").eq(2).attr("id", "newechellonSelect" + newIndex);

        $("table").append(newRow);
    });
@endsection
