@extends('templates.site')
@section('content')
<div class="row mt-5" style="justify-content: flex-end">
        <div class="row">
            <form action="{{route('attestation.export_word_ordervirement')}}" method="get">
                @csrf
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">أمر بتحويل لا رجعة فيه</h5>
                <div class="col-5">
                    <input type="hidden" class="form-control" id="id_agent" name="id_agent" placeholder="" value="" required>
                    <div class="form-group row  my-3">
                        <label class="form-check-label  fs-5 pt-2 col-3" for="nom_agent" >المعني بالأمر :</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control col-5" list="agents_list" id="list_agents" autocomplete="off"  placeholder="تحديد المعني بالأمر" value="" required >

                        <datalist id="agents_list" >
                            @foreach ($agents as $agents)
                            <option data-id="{{$agents->id_agent}}" value="{{$agents->nom_ar}}" >
                            @endforeach
                        </datalist>
                    </div>
                    </div>
                  <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                      <tbody id="info_agent">
                        <tr>
                          <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">الإسم الكامل  :</h6>
                          </td>
                          <td class="border-bottom-0">
                            <p class="mb-0 fw-normal"> </p>
                          </td>
                        </tr>
                        <tr>
                          <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">إسم البنك :</h6>
                          </td>
                          <td class="border-bottom-0">
                            <p class="mb-0 fw-normal text-uppercase"></p>
                          </td>
                        </tr>
                        <tr>
                          <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">  رقم الحساب البنكي  : </h6>
                          </td>
                          <td class="border-bottom-0">
                            <p class="mb-0 fw-normal"></p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div>
                <div class="btnsucc m-4 text-start">
                  <button id="btn_submit" type="submit" style="display: none" class="btn btn-success"><i class="ti ti-printer"></i> طبــاعـة  </button>
                </div>
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
        $url = "{{ route('attestation.find_ordervirement') }}"
        $("#info_agent").html("");
        get_table_ajax_find($text,$url,"#info_agent")
        $("#list_agents").attr("disabled",'');
        $("#btn_submit").show();
        }
      }

@endsection
