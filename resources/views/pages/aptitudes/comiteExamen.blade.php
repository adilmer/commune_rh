@extends('templates.site')
@section('content')


<div class="row ">
    <div class="col-1 ">
        <a href="{{route('aptitude.details',$aptitude->id_aptitude)}}" class="btn btn-outline-success"></i>عودة</a>
    </div>
    <div class="col-sm-8">
        @php
            $grades = App\Models\Grade::all();
        @endphp

      <select name="id_grade" id="id_grade" class="custom-select custom-select-lg mb-3 form-control">
          <option value="" selected>إختيار الهيئة ...</option>
          @foreach ($grades as $grade)
          @php
             $counter = 0;
              foreach ($aptitudes as $key => $aptitude) {
               if($aptitude->agent->id_grade == $grade->id_grade){
                $counter ++;
               }
              }
          @endphp
          @if ($counter>0)
          <option value="{{$grade->id_grade}}" {{ request()->query('id_grade') == $grade->id_grade ? 'selected' : '' }} >{{$grade->nom_grade_ar}}</option>
          @endif

          @endforeach
      </select>
    </div>
    <div class="col-sm-2  ">
        <button type="submit" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal2 ">إضافة موظف </button>
    </div>
</div>
        <div class="row">

          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4"> لائحة موظفي لجنة الإمتحان  </h5>
                <div class="table-responsive">
                  <table class="table table-striped text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">MAT</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">PPR</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0"> الإسم الكامل </h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">الدرجة</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">مشاهدة</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody id="table_agents">

                    @foreach ($aptitudes as $aptitude)
                    @php
                    $agent = App\Models\Agent::where('id_agent',$aptitude->id_agent)->where('id_grade',request()->query('id_grade'))->first();
                    if($agent==null){
                        $agent = App\Models\Agent::where('id_agent',$aptitude->id_agent)->first();
                    }

                    //dd($agent,request()->query('id_grade'));
                    @endphp
                    @if ($agent->id_grade == request()->query('id_grade'))
                    <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">{{$agent->mat}}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$agent->ppr}}</p>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$agent->nom_ar}}</h6>
                            <span class="fw-normal">{{$agent->nom_fr}}</span>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">  {{$agent->grade->nom_grade_ar}}</p>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <a href="{{route('aptitude.comiteExamen_remove',$aptitude->id_liste_aptitude)}}">
                            <span class="badge bg-danger rounded-3 fw-semibold"><i class="ti ti-trash"></i></span>
                            </a>
                          </div>
                        </td>
                      </tr>
                      @endif
                      @if (request()->query('id_grade')==null)
                    <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">{{$agent->mat}}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$agent->ppr}}</p>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$agent->nom_ar}}</h6>
                            <span class="fw-normal">{{$agent->nom_fr}}</span>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">  {{$agent->grade->nom_grade_ar}}</p>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <a href="{{route('aptitude.comiteExamen_remove',$aptitude->id_liste_aptitude)}}">
                            <span class="badge bg-danger rounded-3 fw-semibold"><i class="ti ti-trash"></i></span>
                            </a>
                          </div>
                        </td>
                      </tr>
                    @endif


                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
            <div class="btnsimple text-start m-4 ">
                <button type="submit" class="btn btn-secondary ">تحميــل اللائحـة</button>
            </div>
            </div>

          </div>
        </div>


<!-- modul download agent -->

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{route('aptitude.comiteExamen_save')}}" method="post">
        @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" >  إضافة موظف للائحة</h5>

            </div>
            <div class="modal-body">

    <input type="hidden" class="form-control" id="id_agent" name="id_agent" placeholder="" value="" required>
    <input type="hidden" class="form-control" id="id_aptitude" name="id_aptitude" placeholder="" value="{{$aptitude->id_aptitude}}" required>
    <div class="form-group row  ">
        <label class="form-check-label col-2" for="nom_agent" >المعني بالأمر :</label>
    <div class="col-sm-9">
    <input type="text" class="form-control" list="agents_list" id="list_agents"  autocomplete="off"  placeholder="تحديد المعني بالأمر" value="" required >
        @php
            $agents = App\models\Agent::all();
        @endphp
        <datalist id="agents_list" >
            @foreach ($agents as $agents)
            <option data-id="{{$agents->id_agent}}" value="{{$agents->nom_ar}}" >
            @endforeach
        </datalist>
    </div>
    <div class="col-sm-12   p-1 m-auto d-flex align-items-stretch" id="info_agent">

    </div>
    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-primary">إضافة الى اللائحة</button>
            </div>
        </div>
 </div>
</form>
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
          filterHistory(id_agent)
        }
      }

      $("#id_grade").on("input", function(){
        $id_grade = $("#id_grade").val();
        var newQueryString =
        '?id_grade='+$id_grade;
            var newUrl = window.location.href.split('?')[0]
        + newQueryString;
        window.location.href = newUrl;

        });
@endsection
