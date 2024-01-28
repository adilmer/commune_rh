@extends('templates.site')
@section('content')

<div class="container">

    <div class="row " style="justify-content: flex-end;">

      <div class="col-sm-2 ">
        <a href="{{route('commission.create')}}" class="btn btn-primary"><i class="ti ti-user-plus"></i> إضافة جديدة</a>
      </div>
        <div class="row">

          <div class="col-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">لائحة وتواريخ اللجان </h5>

                    <div class="row">
                  @foreach ($commissions as $commissions)
                  <div class="col-3">
                    <div class="card" style="width: 18rem;">
                    <div class="card-body text-center">
                      <h4 class="cardt_itle ">تواريخ وقرارات اللجان لسنة <b>{{$commissions->annee_commission}}</b></h4>
                      <div class="d-flex align-items-center justify-content-center gap-2">
                        <a href="" class="badge bg-primary rounded-3 fw-semibold"><i class="ti ti-eye"></i></a>
                        <a href="" class="badge bg-success rounded-3 fw-semibold"><i class="ti ti-edit"></i></a>
                        <a href="" onclick='return confirm(`هل تريد حذف هذه الرخصة من قاعدة البيانات ؟`)' class="badge bg-danger rounded-3 fw-semibold"><i class="ti ti-trash"></i></a>
                      </div>
                    </div>
                  </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>



  </div>
@endsection
