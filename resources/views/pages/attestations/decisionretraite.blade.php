@extends('templates.site')
@section('content')
<div class="card row">


            <form action="{{route('attestation.export_word_decisionretraite')}}" method="get">
                @csrf
            <h5 class="card-title fw-semibold mb-4">الوثائق الخاصة بملف التقاعد</h5>
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
                <label for="nomperear" >إسم الأب بالعربية </label>
                <input type="text" class="form-control" id="nomperear" name="nomperear" placeholder="">
              </div>
              <div class="col-6 ">
                <label for="nomperefr">إسم الأب بالفرنسية</label>
                <input name="nomperefr" type="text" class="form-control" id="nomperefr" placeholder="">
              </div>
              <div class="col-6 mt-3">
                <label for="nommerear" >إسم الأم بالعربية </label>
                <input type="text" class="form-control" id="nommerear" name="nommerear" placeholder="">
              </div>
              <div class="col-6 mt-3">
                <label for="nommerefr">إسم الأم بالفرنسية</label>
                <input type="text" class="form-control" name="nommerefr" id="nommerefr" placeholder="">
              </div>
              <div class="col-6 mt-3">
                <label for="nomfemme">إسم الزوج(ة) </label>
                <input  type="text" name="nomfemme" class="form-control" id="nomfemme" placeholder="">
              </div>
              <div class="col-6 mt-3">
                <label for="naissfemme" >تاريخ إزدياد الزوج(ة) </label>
                <input  type="date" name="naissfemme" class="form-control" id="naissfemme" placeholder="">
              </div>
              <div class="col-6 mt-3">
                <label for="date_mar">تاريخ الزواج </label>
                <input  type="date" name="date_mar" class="form-control" id="date_mar" placeholder="">
              </div>
              <div class="col-6 mt-3">
                <label for="fonct_cj">  مهنة الزوج(ة)</label>
                <input type="text" name="fonct_cj" class="form-control" id="fonct_cj" placeholder="">
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
        $url = "{{ route('attestation.find_decisionretraite') }}"
        $("#info_agent").html("");
        get_table_ajax_find($text,$url,"#info_agent")
        $("#list_agents").attr("disabled",'');
        $("#btn_submit").show();
        }
      }

@endsection
