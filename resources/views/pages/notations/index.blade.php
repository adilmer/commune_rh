@extends('templates.site')
@section('content')

        <div class="row ">

            <div class="card row">



                <h5 class="card-title fw-semibold mb-4">تنقيط الموظفين</h5>
                <form action="{{route('notation.save')}}" method="get">
                    @csrf
                <div class="row">
                <h5 class="card-title fw-semibold mb-4"> التنقيط الفردي لموظف</h5>
                    @php
                        $agents = App\Models\Agent::all();
                        $agent = App\Models\Agent::where('id_agent',request()->query('id_agent'))->first();
                        $services = App\Models\Service::all();
                    @endphp
                <input type="hidden" class="form-control" id="id_agent" name="id_agent" placeholder="" value="{{ $agent->id_agent ?? ''}}" required>
                <div class="form-group row  my-3">
                    <label class="form-check-label p-2 col-1" for="nom_agent" >المعني بالأمر :</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" list="agents_list" id="list_agents" value="{{ $agent->nom_ar ?? ''}} {{ $agent->prenom_ar ?? ''}}"  autocomplete="off"  placeholder="تحديد المعني بالأمر" value="" required >

                    <datalist id="agents_list" >
                        @foreach ($agents as $agents)
                        <option data-id="{{$agents->id_agent}}" value="{{$agents->nom_ar}}" >
                        @endforeach
                    </datalist>
                </div>

                <div class="col-sm-5   p-1 m-auto d-flex align-items-stretch" id="info_agent">
                    @if (request()->query('id_agent'))
                    <p> الإسم الكامل :  <span class='text-bold mx-2  px-1' id='nom_ag'>{{ $agent->nom_ar ?? ''}} </span>
                        رقم التأجير  : <span class='text-bold mx-2  px-1'> {{$agent->ppr ?? ''}} </span>
                         رقم التسجيل  : <span class='text-bold mx-2  px-1'> {{$agent->mat ?? ''}} </span></p>
                    @endif

                </div>
                </div>
                  <div class="col-2">
                    @php
                        $note =  App\Models\Notation::where('id_agent',request()->query('id_agent'))->where('annee_notation',date('Y'))->first()->note ?? '';
                    @endphp
                    <label for="nomperear" >نقطة سنة {{date('Y')}}</label>
                    <input type="hidden" class="form-control" id="nomperear" name="annee_notation[]" value="{{date('Y')}}">
                    <input type="number" class="form-control" id="nomperear" name="note[]" step="0.01" value="{{$note}}" >
                  </div>
                  <div class="col-2">
                    @php
                        $note =  App\Models\Notation::where('id_agent',request()->query('id_agent'))->where('annee_notation',date('Y')-1)->first()->note ?? '';
                    @endphp
                    <label for="nomperefr"> نقطة سنة {{date('Y')-1}}</label>
                    <input name="annee_notation[]" type="hidden" class="form-control" id="nomperefr" value="{{date('Y')-1}}">
                    <input name="note[]" type="number" class="form-control" id="nomperefr" step="0.01" value="{{$note}}">
                  </div>
                  <div class="col-2">
                    @php
                        $note =  App\Models\Notation::where('id_agent',request()->query('id_agent'))->where('annee_notation',date('Y')-2)->first()->note ?? '';
                    @endphp
                    <label for="nomperear" >نقطة سنة {{date('Y')-2}}</label>
                    <input type="hidden" class="form-control" id="nomperear" name="annee_notation[]" value="{{date('Y')-2}}">
                    <input type="number" class="form-control" id="nomperear" name="note[]" step="0.01" value="{{$note}}">
                  </div>
                  <div class="col-2">
                    @php
                        $note =  App\Models\Notation::where('id_agent',request()->query('id_agent'))->where('annee_notation',date('Y')-3)->first()->note ?? '';
                    @endphp
                    <label for="nomperear" >نقطة سنة {{date('Y')-3}}</label>
                    <input type="hidden" class="form-control" id="nomperear" name="annee_notation[]" value="{{date('Y')-3}}">
                    <input type="number" class="form-control" id="nomperear" name="note[]" step="0.01" value="{{$note}}">
                  </div>
                  <div class="col-2">
                    @php
                        $note =  App\Models\Notation::where('id_agent',request()->query('id_agent'))->where('annee_notation',date('Y')-4)->first()->note ?? '';
                    @endphp
                    <label for="nomperear" >نقطة سنة {{date('Y')-4}}</label>
                    <input type="hidden" class="form-control" id="nomperear" name="annee_notation[]" value="{{date('Y')-4}}">
                    <input type="number" class="form-control" id="nomperear" name="note[]" step="0.01" value="{{$note}}">
                  </div>
                  <div class="col-2">
                    @php
                        $note =  App\Models\Notation::where('id_agent',request()->query('id_agent'))->where('annee_notation',date('Y')-5)->first()->note ?? '';
                    @endphp
                    <label for="nomperear" >نقطة سنة {{date('Y')-5}}</label>
                    <input type="hidden" class="form-control" id="nomperear" name="annee_notation[]" value="{{date('Y')-5}}">
                    <input type="number" class="form-control"  id="nomperear" name="note[]" step="0.01" value="{{$note}}">
                  </div>
                </div>
            </form>
                <div class="btnsucc m-4 text-start">
                  <button id="btn_submit"  type="submit" class="btn btn-primary"><i class="ti ti-printer"></i> حفظ التعديلات   </button>
                  <button id="btn_submit"  type="button" class="btn btn-success" {{request()->query('id_agent')!=null ? '' : 'disabled'}} data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="ti ti-printer" ></i> تحميل بطائق التنقيط  </button>
                </div>
                <h5 class="card-title fw-semibold mb-4"> التنقيط حسب المصلحة </h5>

                <form action="{{route('notation.fiche_notation')}}" method="get">
                <div class="row">
                    <div class="col-sm-7 pl-0 mb-2">
                        <select name="id_service" id="id_service" class="custom-select custom-select-lg mb-3 form-control">
                                @foreach ($services as $service)
                                <option value="{{$service->id_service}}" >{{$service->nom_service_ar}}</option>
                                @endforeach
                        </select>
                      </div>
                      <div class="col-sm-2 pl-0 mb-2">
                    <input type="text" class="form-control" value="{{date('Y')}}" id="nomperear" name="anneeD">
                      </div>
                      <div class="col-sm-3 ">
                        <button id="print_list" target="_blank" class="btn btn-primary"><i class="ti ti-printer"></i> طباعة الكل</button>
                      </div>
                </div>
            </form>





              </div>

        </div>

<!-- modul download agent -->

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('notation.fiche_notation')}}" method="get">
            <div class="modal-header">
              <h5 class="modal-title" >تحميل بطائق التنقيط </h5>

            </div>
            <div class="modal-body">
<div class="row">
        <input type="hidden" name="id_agent" value="{{request()->query('id_agent')}}">
    <div class="col-4 ">
        <label for="nomperear" > من سنة </label>
        <input type="text" value="{{date('Y')}}" class="form-control" id="nomperear" name="anneeD" >
    </div>
    <div class="col-4 ">
        <label for="nomperear" > الى</label>
        <input type="text" class="form-control" value="{{date('Y')}}" id="nomperear" name="anneeF">
      </div>
</div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-primary">حفط الملف</button>
            </div>
        </form>
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
        $text = id_agent
        var newQueryString = '?id_agent='+id_agent;
        var newUrl = window.location.href.split('?')[0] + newQueryString;
        window.location.href = newUrl;
        {{-- $url = "{{ route('attestation.find_tps') }}"
        $("#info_agent").html("");
        get_table_ajax_find($text,$url,"#info_agent") --}}


      }}

      $(".btn_filter_status").on("click", function(){
        var newQueryString = '?description_status='+this.id;
        var newUrl = window.location.href.split('?')[0] + newQueryString;
        window.location.href = newUrl;
    });
@endsection
