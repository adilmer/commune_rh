@extends('templates.site')
@section('content')
<div class="card row">


            <form action="{{route('attestation.export_word_tps')}}" method="get">
                @csrf
            <h5 class="card-title fw-semibold mb-4">tps</h5>
            <div class="row">
                <input type="hidden" class="form-control" id="id_agent" name="id_agent" placeholder="" value="" required>
                <div class="form-group row  my-3">
                    <label class="form-check-label p-2 col-1" for="nom_agent" >المعني بالأمر :</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" list="agents_list" id="list_agents"  autocomplete="off"  placeholder="تحديد المعني بالأمر" value="" required >

                    <datalist id="agents_list" >
                        @foreach ($agents as $agents)
                        <option data-id="{{$agents->id_agent}}" value="{{$agents->nom_ar}}" >
                        @endforeach
                    </datalist>
                </div>
                <div class="col-sm-5   p-1 m-auto d-flex align-items-stretch" id="info_agent">

                </div>
                </div>
              <div class="col-6 ">
                <label for="date" >التاريخ</label>
                <input type="text" class="form-control" id="datex" value="فاتح يناير 2023" name="datex" placeholder="">
              </div>
              <div class="col-6 ">
                <label for="typeachgal">نوع الأشغال</label>
                <input name="typeachgal" type="text" class="form-control" id="typeachgal" placeholder="">
              </div>

            </div>

            <div class="btnsucc m-4 text-start">
              <button id="btn_submit" style="display: none" type="submit" class="btn btn-success"><i class="ti ti-printer"></i> طباعة الوثائق </button>
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
        $url = "{{ route('attestation.find_tps') }}"
        $("#info_agent").html("");
        get_table_ajax_find($text,$url,"#info_agent")
        $("#list_agents").attr("disabled",'');
        $("#btn_submit").show();
        }
      }

@endsection
