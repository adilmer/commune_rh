@extends('templates.site')
@section('content')
<div class="row">
    <div class="col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="row alig n-items-start">
            <div class="col-10">
              <h5 class="card-title mb-9 fw-semibold"> الموظفين في رخصة </h5>
                 <h4 class="fw-semibold mb-3">{{ $countconge }}</h4>
            </div>
            <div class="col-2">
              <div class="d-flex justify-content-end">
                <div
                  class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                  <i class="ti ti-users fs-6"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="row alig n-items-start">
            <div class="col-10">
              <h5 class="card-title mb-9 fw-semibold"> مجموع الموظفين </h5>
              <h4 class="fw-semibold mb-3">{{$totalagent }}</h4>
            </div>
            <div class="col-2">
              <div class="d-flex justify-content-end">
                <div
                  class="text-white bg-warning rounded-circle p-6 d-flex align-items-center justify-content-center">
                  <i class="ti ti-users fs-6"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="row alig n-items-start">
            <div class="col-10">
              <h5 class="card-title mb-9 fw-semibold"> المتدربين الحاليين </h5>
              <h4 class="fw-semibold mb-3">{{$countstage}}</h4>
            </div>
            <div class="col-2">
              <div class="d-flex justify-content-end">
                <div
                  class="text-white bg-success rounded-circle p-6 d-flex align-items-center justify-content-center">
                  <i class="ti ti-users fs-6"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="row alig n-items-start">
            <div class="col-10">
              <h5 class="card-title mb-9 fw-semibold"> المتقاعدون خلال السنة </h5>
              <h4 class="fw-semibold mb-3">{{$retraites}}</h4>
            </div>
            <div class="col-2">
              <div class="d-flex justify-content-end">
                <div
                  class="text-white bg-danger rounded-circle p-6 d-flex align-items-center justify-content-center">
                  <i class="ti ti-users fs-6"></i>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <h1></h1>
        <!--  Row 1 -->
        <div class="row ">
      <!--
            <div class="col-lg-5 d-flex align-items-strech ">
            <div class="card w-100 align-items-center">
              <div class="card-body">
                <div class="wrapper">
                  <header>
                      <p class="current-date"></p>
                      <div class="icons">
                      </div>
                  </header>
                  <div class="calendar">
                      <ul class="weeks">
                          <li>Sun</li>
                          <li>Mon</li>
                          <li>Tue</li>
                          <li>Wed</li>
                          <li>Thu</li>
                          <li>Fri</li>
                          <li>Sat</li>
                      </ul>
                      <ul class="days"></ul>
                  </div>
              </div>

              </div>
            </div>
          </div>
-->

          <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <div class="mb-3 mb-sm-0">
                      <h5 class="card-title fw-semibold">الموظفين في رخصة</h5>
                    </div>
                    <div class="table">
                      <table class="table mb-0 align-middle">
                      <thead class="text-dark fs-4 table-primary">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">إسم الموظف</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">
                            تاريخ إستئناف العمل</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">ينوب عنه</h6>
                        </th>
                      </tr>
                    </thead>
                        <tbody>
                        @foreach ($listconge as $listconges)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">{{$listconges -> nom_ar}}</h6>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">{{$listconges -> date_prise}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$listconges -> remplacant}}</p>
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div class="text-start">
                        @if ($listconge->count()>5)
                        <a href="{{route('home.listconge')}}">مشاهدة الكل  </a>
                        @endif
                      </div>
                    </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <div class="mb-3 mb-sm-0">
                      <h5 class="card-title fw-semibold">قائمة الأعياد الوطنية لسنة {{date('Y')}}</h5>
                    </div>
                    <div class="table">
                      <table class="table mb-0 align-middle">
                        <thead class="text-dark fs-4 table-primary">

                          <tr>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">نوع العطلة</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">تاريخها  </h6>
                          </th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">رأس السنة الميلادية</h6>
                                <span class="fw-normal">يوم واحد</span>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">01/01/{{date('Y')}}</p>
                            </td>
                          </tr>
                          <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">تقديم وثيقة الاستقلال</h6>
                            <span class="fw-normal">يوم واحد</span>
                            </td>
                            <td class="border-bottom-0">
                             <p class="mb-0 fw-normal">11/01/{{date('Y')}}</p>
                            </td>
                        </tr>
                          <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">عيد الشغل</h6>
                            <span class="fw-normal">يوم واحد</span>
                            </td>
                            <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">01/05/{{date('Y')}}</p>
                             </td>
                          </tr>

                          <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">عيد العرش</h6>
                            <span class="fw-normal">يوم واحد</span>
                            </td>
                            <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">30/07/{{date('Y')}}</p>
                            </td>
                          </tr>

                          <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">ذكرى استرجاع وادي الذهب</h6>
                            <span class="fw-normal">يوم واحد</span>
                            </td>
                            <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">14/08/{{date('Y')}}</p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="text-start">
                    <a href="{{route('home.vacances')}}">مشاهدة الكل</a>
                  </div>
                    </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card pb-3">
              <div class="card-body">
                <div class="mb-3 mb-sm-0">
                  <h5 class="card-title fw-semibold">الموظفين المحالين على التقاعد في سنة {{date('Y')}}</h5>
                </div>
                <div class="table-responsive">
                  <table class="table  mb-0 align-middle">
                    <thead class="text-dark fs-4 table-primary">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">إسم الموظف</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">تاريخ الإحالة</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($listretraites as $listretraite)
                        @if($loop->iteration <= 5)
                      <tr>
                        <td class="border-bottom-1"><a href="{{route('agent.details',$listretraite->id_agent)}}">
                            <h6 class="fw-semibold mb-1">{{$listretraite -> nom_ar}}</h6>
                            <span class="fw-normal">{{$listretraite -> nom_fr}}</span>
                        </a>
                        </td>

                        <td class="border-bottom-1">
                          <p class="mb-0 fw-normal">{{ date('Y/m/d', strtotime($listretraite->dateret)) }}</p>
                        </td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                  <div class="text-start">
                    @if ($listretraites->count()>5)
                    <a href="{{route('home.listretraites')}}">مشاهدة الكل</a>
                    @endif

                  </div>
                </div>
          </div>
        </div>
      </div>
        </div>

@endsection


