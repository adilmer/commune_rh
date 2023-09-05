@extends('templates.site')
@section('content')
<div class="row">
          <div class="col-lg">
            <div class="card">
              <div class="card-body">
                <div class="mb-3 mb-sm-0">
                  <h5 class="card-title fw-semibold">الموظفين المحالين على التقاعد </h5>
                </div>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
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
                    @foreach ($listretraites2 as $listretraites2)
                      <tr>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$listretraites2 -> nom_ar}}</h6>
                             <span class="fw-normal">{{$listretraites2 -> nom_fr}}</span>
                        </td>
                        <td class="border-bottom-0">
                         <p class="mb-0 fw-normal">{{ date('Y/m/d', strtotime($listretraites2->dateret)) }}</p>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
          </div>
        </div>
      </div>
        </div>
 
        

        @endsection
