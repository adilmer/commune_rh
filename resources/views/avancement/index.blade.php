@extends('templates.site')
@section('content')

<div class="inputsearch row" style="justify-content: flex-end;">

  <div class="col-sm-6 pl-0 mb-2  ">
    <input class="form-control" list="agents_list" id="list_agents"  placeholder="بحث...">
<input type="hidden" class="form-control" id="id_agent" name="id_agent" placeholder="" value="" required>
<datalist id="agents_list">
    @php
        $agents = App\Models\Agent::all();
    @endphp
    @foreach ($agents as $agents)
    <option data-id="{{$agents->id_agent}}" value="{{$agents->nom_ar}}" >
    @endforeach
</datalist>
  </div>
  <div class="col-sm-3 pl-0 mb-2  ">

  </div>
  <div class="col-sm-2 ">
    <a href="{{route('agent.create')}}" class="btn btn-primary"><i class="ti ti-user-plus"></i> إضافة موظف</a>

  </div>







      <div class="row" >
        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="card w-100">

            <div class="card-body p-4">
                <button type="button" style="float:left" class="btn btn-sm btn-outline-success text-capitalize float-left btn-round" data-bs-toggle="modal"
                      data-bs-target="#modal-export_agent">
                      <i class="la la-download"></i>تحميل Excel
                  </button>
              <h5 class="card-title  fw-semibold mb-4">لائحة الموظفين</h5>


              </div>

              <div class="table ">
                <table class="table  mb-0 align-middle">
                  <thead class="text-dark fs-4 ">
                    <tr>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0"></h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">MAT</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">PPR</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">الإسم الكامل</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">الدرجة</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">السلم</h6>
                      </th>
                       <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">الرتبة</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">المصلحة</h6>
                      </th>

                      <th class="border-bottom-0 col-sm-1">
                        <h6 class="fw-semibold mb-0">الرتبة المستحقة </h6>
                      </th>

                      <th class="border-bottom-0 pos">
                        <h6 class="fw-semibold mb-0">تاريخ الرتبة المستحقة</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody id="table_agents">
                      {{-- liste agents --}}
                      @foreach ($table_agents as $table_agents)
                        @php
                        $agent = App\Models\Agent::where('id_agent',request()->query('id_agent'))->first();
                        if($agent==null){
                            $agent = App\Models\Agent::where('id_agent',$table_agents->id_agent)->first();
                        }
                        //dd($agent,request()->query('id_grade'));
                        @endphp
                        @if ($table_agents->id_agent == request()->query('id_agent'))

                    <tr>
                      <td class="border-bottom-0">
                        <div class="img" >

                        </div>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">{{$table_agents->mat}}</h6>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{$table_agents->ppr}}</p>
                      </td>
                      <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-1">{{$table_agents->nom_ar}}</h6>
                          <span class="fw-normal">{{$table_agents->nom_fr}}</span>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{$table_agents->grade->nom_grade_ar}}</p>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{$table_agents->echelle}}</p>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{$table_agents->echellon}}</p>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{$table_agents->bureau->service->nom_service_ar}}</p>
                      </td>

                      <td class="border-bottom-0 pos">
                        <p class="mb-0 fw-normal">{{$table_agents->nouveau_echellon}}</p>
                      </td>

                      <td class="border-bottom-0 pos col-sm-1">
                        <p class="mb-0 fw-normal">{{$table_agents->nouveau_date_echellon}}</p>
                      </td>
                    </tr>
                    @endif
                    @if (request()->query('id_agent')==null)
                    <tr>
                        <td class="border-bottom-0">
                          <div class="img" >

                          </div>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">{{$table_agents->mat}}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$table_agents->ppr}}</p>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$table_agents->nom_ar}}</h6>
                            <span class="fw-normal">{{$table_agents->nom_fr}}</span>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$table_agents->grade->nom_grade_ar}}</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$table_agents->echelle}}</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$table_agents->echellon}}</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{$table_agents->bureau->service->nom_service_ar}}</p>
                        </td>

                        <td class="border-bottom-0 pos">
                          <p class="mb-0 fw-normal">{{$table_agents->nouveau_echellon}}</p>
                        </td>

                        <td class="border-bottom-0 pos col-sm-1">
                          <p class="mb-0 fw-normal">{{$table_agents->nouveau_date_echellon}}</p>
                        </td>
                      </tr>
                      @endif
                    @endforeach

                  </tbody>
                </table>
              </div>
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
          var newQueryString =
        '?id_agent='+id_agent;
            var newUrl = window.location.href.split('?')[0]
        + newQueryString;
        window.location.href = newUrl;
        }
      }
@endsection
