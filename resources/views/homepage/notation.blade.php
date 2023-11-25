@extends('templates.site')
@section('content')

        <div class="row ">

            <div class="card row">


                <form action="{{route('notation.save')}}" method="get">
                    @csrf
                <h5 class="card-title fw-semibold mb-4">تنقيط الموظفين</h5>
                <div class="row">
                <h5 class="card-title fw-semibold mb-4"> التنقيط الفردي لموظف</h5>
                    @php
                        $agents = App\Models\Agent::all();
                    @endphp
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
                  <div class="col-2">
                    <label for="nomperear" >نقطة سنة {{date('Y')}}</label>
                    <input type="hidden" class="form-control" id="nomperear" name="annee_notation[]" value="{{date('Y')}}">
                    <input type="number" class="form-control" id="nomperear" name="note[]" placeholder="">
                  </div>
                  <div class="col-2">
                    <label for="nomperefr"> نقطة سنة {{date('Y')-1}}</label>
                    <input name="annee_notation[]" type="hidden" class="form-control" id="nomperefr" value="{{date('Y')-1}}">
                    <input name="note[]" type="number" class="form-control" id="nomperefr" placeholder="">
                  </div>
                  <div class="col-2">
                    <label for="nomperear" >نقطة سنة {{date('Y')-2}}</label>
                    <input type="hidden" class="form-control" id="nomperear" name="annee_notation[]" value="{{date('Y')-2}}">
                    <input type="number" class="form-control" id="nomperear" name="note[]" placeholder="">
                  </div>
                  <div class="col-2">
                    <label for="nomperear" >نقطة سنة {{date('Y')-3}}</label>
                    <input type="hidden" class="form-control" id="nomperear" name="annee_notation[]" value="{{date('Y')-3}}">
                    <input type="number" class="form-control" id="nomperear" name="note[]" placeholder="">
                  </div>
                  <div class="col-2">
                    <label for="nomperear" >نقطة سنة {{date('Y')-4}}</label>
                    <input type="hidden" class="form-control" id="nomperear" name="annee_notation[]" value="{{date('Y')-4}}">
                    <input type="number" class="form-control" id="nomperear" name="note[]" placeholder="">
                  </div>
                  <div class="col-2">
                    <label for="nomperear" >نقطة سنة {{date('Y')-5}}</label>
                    <input type="hidden" class="form-control" id="nomperear" name="annee_notation[]" value="{{date('Y')-5}}">
                    <input type="number" class="form-control" id="nomperear" name="note[]" placeholder="">
                  </div>
                </div>

                <div class="btnsucc m-4 text-start">
                  <button id="btn_submit"  type="submit" class="btn btn-primary"><i class="ti ti-printer"></i> حفظ التعديلات   </button>
                  <button id="btn_submit"  type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="ti ti-printer" ></i> تحميل بطائق التنقيط  </button>
                </div>
                <h5 class="card-title fw-semibold mb-4"> التنقيط حسب المصلحة </h5>


                <div class="row">
                    <div class="col-sm-7 pl-0 mb-2">
                        <select name="id_bureau" id="id_bureau" class="custom-select custom-select-lg mb-3 form-control">

                            <option value="0" selected>اختر ...</option>

                        </select>
                      </div>
                      <div class="col-sm-2 pl-0 mb-2">
                    <input type="text" class="form-control" value="{{date('Y')}}" id="nomperear" name="annee_notation[]" value="{{date('Y')-1}}">
                      </div>
                      <div class="col-sm-3 ">
                        <a id="print_list" target="_blank"  href="{{route('absence.generate')}}" class="btn btn-primary"><i class="ti ti-printer"></i> طباعة الكل</a>
                      </div>
                </div>




            </form>

              </div>

        </div>

<!-- modul download agent -->

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" >تحميل بطائق التنقيط </h5>

            </div>
            <div class="modal-body">
<div class="row">

    <div class="col-4 ">
        <label for="nomperear" > من سنة </label>
        <input type="text" value="{{date('Y')}}" class="form-control" id="nomperear" name="annee_notation[]" >
    </div>
    <div class="col-4 ">
        <label for="nomperear" > الى</label>
        <input type="text" class="form-control" value="{{date('Y')-1}}" id="nomperear" name="annee_notation[]">
      </div>
</div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-primary">حفط الملف</button>
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
          $("#id_agents").val(id_agent);
        $text = id_agent;
        $url = "{{ route('attestation.find_tps') }}"
        $("#info_agent").html("");
        get_table_ajax_find($text,$url,"#info_agent")

        $("#btn_submit").show();
        }
      }

@endsection
