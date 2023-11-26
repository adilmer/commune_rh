@extends('templates.site')
@section('content')
<div class="card" dir="ltr">
          <div class="card-body">
            <form action="" method="get">
                @csrf
            <h5 class="card-title fw-semibold mb-4">Avancement Echelon</h5>
            <div class="form-group row  my-3">
              <div class="row">
              <div class="col-6 m-0">
                <input type="hidden" class="form-control" id="id_agent" name="id_agent" placeholder="" value="" required>
                <label for="list_agents" >Nom fonctionnaire : </label>
                <input type="text" class="form-control" list="agents_list" id="list_agents"  autocomplete="off"  placeholder="Select fonctionnaire" value="" required >
              <datalist id="agents_list" >

              </div>
              </div>

              <div class="col-sm-5 m-1" id="info_agent">

              </div>

            <div class="row">
              <div class="col-5 mt-3">
                <h3 class="text-center">Ancien Situation</h3>
                <table class="table table-striped text-nowrap">
                    <tr>
                        <th>ECH</th>
                        <th>ECHL</th>
                        <th>IND</th>
                        <th>Date Deff</th>
                    </tr>
                    <tr>
                        <td><select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>9</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="3">4</option>
                            <option value="3">5</option>
                            <option value="3">6</option>
                            <option value="3">7</option>
                            <option value="3">8</option>
                            <option value="3">9</option>
                            <option value="3">10</option>
                            <option value="3">exp</option>
                          </select></td>
                        <td><select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>4</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="3">4</option>
                            <option value="3">5</option>
                            <option value="3">6</option>
                            <option value="3">7</option>
                            <option value="3">8</option>
                            <option value="3">9</option>
                            <option value="3">10</option>
                            <option value="3">11</option>
                            <option value="3">HE</option>
                            <option value="3">exp</option>
                          </select></td>
                        <td><input class="form-control" type="text" value="273"></td>
                        <td><input class="form-control" type="text" value="12/02/2019"></td>
                    </tr>
                </table>
              </div>
              <div class="col-2 d-flex align-items-center justify-content-center "> <div class=""><button class="btn btn-primary">Calcul Situation >></button></div></div>
              <div class="col-5 mt-3">
                <h3 class="text-center">Nouvelle Situation</h3>
                <table class="table table-striped text-nowrap">
                    <tr>
                        <th>ECH</th>
                        <th>ECHL</th>
                        <th>IND</th>
                        <th>Date Deff</th>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>5</td>
                        <td>276</td>
                        <td>12/02/2022</td>
                    </tr>
                </table>
              </div>

            <div class="btnsucc m-4 text-end">
              <button type="submit" id="btn_submit" class="btn btn-success" ><i class="ti ti-printer"></i> طباعة القرارات </button>
              <button type="submit" id="btn_submit" class="btn btn-success" ><i class="ti ti-printer"></i> État D'engagement </button>
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
