@extends('templates.site')
@section('content')
<div class="card">
    <form action="{{route('aptitude.save')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">إضافة دورة جديدة</h5>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-6 mt-4">
                <label for="annee_aptitude" >سنة الدورة</label>
                <input type="number" class="form-control" id="annee_aptitude" name="annee_aptitude" placeholder="" value="{{date('Y')}}">
              </div>

              <div class="col-6 mt-4">
                <label for="dateD_aptitude"> تاريخ إجراء الإمتحان</label>
                <input type="date" class="form-control" id="dateD_aptitude" name="dateD_aptitude" placeholder="">
              </div>
              <div class="col-6 mt-4">
                <label for="lieu_aptitude" >مكان إجراء الإمتحان  </label>
                <input name="lieu_aptitude" type="text" class="form-control text-uppercase" id="lieu_aptitude" placeholder="">
              </div>
              <div class="col-6 mt-4">
                <label for="dateF_aptitude"> أخر إجل إستلام الملفات  </label>
                <input name="dateF_aptitude" type="date" class="form-control" id="dateF_aptitude" placeholder="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="btnsimple text-start m-4 ">
        <button type="submit" class="btn btn-primary ">حفظ المعلومــات</button>
      </div>
    </form>
    </div>
@endsection
