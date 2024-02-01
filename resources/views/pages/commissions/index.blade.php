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
                <h4 class="card-title fw-semibold mb-4">تواريخ وقرارات اللجان</h4>
              <div class="card-body p-4">
                    <div class="row">
                  @foreach ($commissions as $commissions)
                  <div class="col-3">
                    <div class="card bg-light border border border-dark" style="width: 18rem;">
                    <div class="card-body text-center">
                      <h5 class="cardt_itle ">تواريخ وقرارات اللجان لسنة <b>{{$commissions->annee_commission}}</b></h5>
                      <div class="d-flex align-items-center justify-content-center gap-2">
                        <a href="{{route('commission.details',$commissions->annee_commission)}}" class="badge bg-primary rounded-3 fw-semibold"><i class="ti ti-eye"></i></a>
                        <a href="{{route('commission.edit',$commissions->annee_commission)}}" class="badge bg-success rounded-3 fw-semibold"><i class="ti ti-edit"></i></a>
                        <a href="{{route('commission.delete',$commissions->annee_commission)}}" onclick='return confirm(`هل تريد حذف هذه السنة من قاعدة البيانات ؟`)' class="badge bg-danger rounded-3 fw-semibold"><i class="ti ti-trash"></i></a>
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
