@extends('templates.site')
@section('content')


<div class="row ">
    <div class="col-1 ">
        <a href="{{route('aptitude.details',$aptitude->id_aptitude)}}" class="btn btn-outline-success"></i>عودة</a>
    </div>
    <div class="col-sm-7">
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
</div>
        <div class="row">

          <div class="col-lg-12 d-flex align-items-stretch">
            <form action="{{route('aptitude.notationEcrit_save')}}" method="post">
            @csrf
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4"> لائحة المجتازين للإختبار الكتابي</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
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
                            <h6 class="fw-semibold mb-0"> الأقدمية في الدرجة</h6>
                          </th>
                           <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">تاريخ إستيفاء الشرط</h6>
                          </th>

                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">نقطة الإمتحان الكتابي</h6>
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
                                <p class="mb-0 fw-normal">{{$agent->date_grade->format('Y-m-d')}}</p>
                              </td>
                              <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$agent->date_grade->format('Y')+6 .'-'.$agent->date_grade->format('m-d') }}</p>
                              </td>
                         <td class="border-bottom-0 ">
                                <input type="hidden" name="id_liste_aptitude[]" value="{{$aptitude->id_liste_aptitude}}">
                                <input class="form-control" type="text" name="note_ecrit[]" >
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
                        <p class="mb-0 fw-normal">{{$agent->date_grade->format('Y-m-d')}}</p>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{$agent->date_grade->format('Y')+6 .'-'.$agent->date_grade->format('m-d') }}</p>
                      </td>
                      <td class="border-bottom-0 ">
                        <input type="hidden" name="id_liste_aptitude[]" value="{{$aptitude->id_liste_aptitude}}">
                                <input class="form-control" type="number" min="0" max="20" step="0.25" name="note_ecrit[]" value="{{$aptitude->note_ecrit ?? 0}}" >
                        </td>
                    </tr>
                  @endif


                    @endforeach
                  </tbody>
                  </table>
                </div>
            </div>
            <div class="btnsimple text-start m-4 ">
                <button type="submit" class="btn btn-primary ">حفظ المعلومــات</button>
            </div>
            </div>
        </form>
          </div>
        </div>


@endsection


@section('script')

      $("#id_grade").on("change", function(){
        $id_grade = $("#id_grade").val();
        var newQueryString =
        '?id_grade='+$id_grade;
            var newUrl = window.location.href.split('?')[0]
        + newQueryString;
        window.location.href = newUrl;

        });
@endsection


