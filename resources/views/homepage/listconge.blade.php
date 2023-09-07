@extends('templates.site')
@section('content')
<div class="col-lg">
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
                          <h6 class="fw-semibold mb-0">تاريخ إستئناف العمل</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">ينوب عنه</h6>
                        </th>
                      </tr>
                    </thead>
                        <tbody>
                        @foreach ($listconge as $listconge)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">{{$listconge -> nom_ar}}</h6>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">{{$listconge -> date_prise}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$listconge -> remplacant}}</p>
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
              </div>
            </div>
          </div>
@endsection
