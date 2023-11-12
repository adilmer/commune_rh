@extends('templates.site')
@section('content')

        <div class="row ">

            <div class="card row">




                <div class="row">
                <h5 class="card-title fw-semibold mb-4 my-4"> اعدادات الترقية </h5>
                    @php
                        $grades = App\Models\Grade::all();
                        $grade_req = App\Models\Grade::where('id_grade', '=', request()->query('id_grade'))->first();
                        $indemnites = App\Models\Indemnite::where('id_grade',request()->query('id_grade'))->get();
                        $echellons = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "0"];
                    @endphp
                <input  type="hidden" class="form-control" id="id_grade" name="id_grade" placeholder="" value="{{ $grade_req->nom_grade_fr ?? ''}}" required>
                <div class="form-group row  my-3">
                    <label class="form-check-label p-2 col-1" for="nom_grade" > الدرجة :</label>
                <div class="col-sm-5">
                <input  type="text" class="form-control" list="grades_list" id="list_grades" value="{{ $grade_req->nom_grade_fr ?? ''}}"  autocomplete="off"  placeholder="تحديد الدرجة" value="" required >

                    <datalist id="grades_list" >
                        @foreach ($grades as $grades)
                        <option data-id="{{$grades->id_grade}}" value="{{$grades->nom_grade_fr}}" >
                        @endforeach
                    </datalist>
                </div>
                <div class="col-sm-5   p-1 m-auto  align-items-stretch" id="info_agent">
                    @if (request()->query('id_grade'))
                    <p>  الدرجة المختارة بالعربية:  <span class='text-bold mx-2  px-1' id='nom_ag'>{{ $grade_req->nom_grade_ar ?? ''}}</span> </p>
                    <p>  الدرجة المختارة بالفرنسية:  <span class='text-bold mx-2  px-1' id='nom_ag'>{{ $grade_req->nom_grade_fr ?? ''}} </span></p>

                    @endif

                </div>

                </div>
                <form action="{{route('grade.save')}}" method="get" style="display:{{request()->query('id_grade')==null ? 'none' : 'block' }}">
                    @csrf
                <div class="table ">
                    <table class="table  mb-0 align-middle">
                      <thead class="text-dark fs-4 text-capitalize">
                        <tr>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Echellon</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Indice</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">sujection</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">encadrement</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">administrative speciale</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">technicite</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">fonction</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">hierarchique</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">special</h6>
                          </th>
                        </tr>
                      </thead>
                      <tbody id="table_indemnites">
                        <input class="form-control text-center text-bold" type="hidden" name="id_grade" value="{{request()->query('id_grade')}}">
                        @foreach ($echellons as $echellon)
                        @php
                            $indemnite = App\Models\Indemnite::where('id_grade',request()->query('id_grade'))->where('echellon',$echellon)->first();
                        @endphp
                        <tr>
                            <input class="form-control text-center text-bold" type="hidden" name="echellon[]" value="{{$echellon}}">
                            <td><input class="form-control text-center text-bold" type="text" value="{{$echellon==0 ? "Exp" : $echellon}}" disabled></td>
                            <td><input class="form-control text-center text-bold" type="number"  value="{{$indemnite->indice ?? 0 }}" name="indice[]"></td>
                            <td><input class="form-control text-center text-bold" type="number" step="0.01" value="{{$indemnite->sujection ?? 0 }}" name="sujection[]"></td>
                            <td><input class="form-control text-center text-bold" type="number" step="0.01" value="{{$indemnite->encadrement ?? 0 }}" name="encadrement[]"></td>
                            <td><input class="form-control text-center text-bold" type="number" step="0.01" value="{{$indemnite->administrative ?? 0 }}" name="administrative[]"></td>
                            <td><input class="form-control text-center text-bold" type="number" step="0.01" value="{{$indemnite->technicite ?? 0 }}" name="technicite[]"></td>
                            <td><input class="form-control text-center text-bold" type="number" step="0.01" value="{{$indemnite->fonction ?? 0 }}" name="fonction[]"></td>
                            <td><input class="form-control text-center text-bold" type="number" step="0.01" value="{{$indemnite->hierarchique ?? 0 }}" name="hierarchique[]"></td>
                            <td><input class="form-control text-center text-bold" type="number" step="0.01" value="{{$indemnite->speciale ?? 0 }}" name="speciale[]"></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>

                <div class="btnsucc m-4 text-start">
                  <button id="btn_submit" type="submit" class="btn btn-primary"><i class="ti ti-printer"></i> حفظ التعديلات   </button>
                </div>


            </form>

              </div>

        </div>





@endsection


@section('script')

list_grades.addEventListener('change', getIdgrade);
    function getIdgrade() {
        var input = document.getElementById("list_grades");
        var selectedOption = document.querySelector("#grades_list option[value='" + input.value + "']");

        if (selectedOption) {
          var id_grade = selectedOption.getAttribute("data-id");
          $("#id_grade").val(id_grade);
        $text = id_grade
        var newQueryString = '?id_grade='+id_grade;
        var newUrl = window.location.href.split('?')[0] + newQueryString;
        window.location.href = newUrl;
        {{-- $url = "{{ route('attestation.find_tps') }}"
        $("#info_grade").html("");
        get_table_ajax_find($text,$url,"#info_grade") --}}


      }}

      $(".btn_filter_status").on("click", function(){
        var newQueryString = '?description_status='+this.id;
        var newUrl = window.location.href.split('?')[0] + newQueryString;
        window.location.href = newUrl;
    });
@endsection
