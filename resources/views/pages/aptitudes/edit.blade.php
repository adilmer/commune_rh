@extends('templates.site')
@section('content')
<div class="card">
    <form action="{{route('aptitude.update')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">تعديل معلومات الدورة </h5>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-6 mt-4">
                <input type="hidden" name="id_aptitude" value="{{$aptitude->id_aptitude}}">
                <label for="annee_aptitude" >سنة الدورة</label>
                <input type="number" class="form-control" id="annee_aptitude" name="annee_aptitude" placeholder="" value="{{$aptitude->annee_aptitude}}">
              </div>
              <div class="col-6 mt-4">
                <label for="dateD_aptitude"> تاريخ إجراء الإمتحان</label>
                <input type="date" class="form-control" id="dateD_aptitude" name="dateD_aptitude" placeholder="" value="{{$aptitude->dateD_aptitude->format('Y-m-d')}}">
              </div>
              <div class="col-6 mt-4">
                <label for="lieu_aptitude" >مكان إجراء الإمتحان  </label>
                <input name="lieu_aptitude" type="text" class="form-control text-uppercase" id="lieu_aptitude" placeholder="" value="{{$aptitude->lieu_aptitude}}">
              </div>
              <div class="col-6 mt-4">
                <label for="dateF_aptitude"> أخر إجل إستلام الملفات  </label>
                <input name="dateF_aptitude" type="date" class="form-control" id="dateF_aptitude" placeholder="" value="{{$aptitude->dateF_aptitude->format('Y-m-d')}}">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="btnsimple text-start m-4 ">
        <button type="submit" class="btn btn-primary ">تحديث المعلومــات</button>
      </div>
    </form>
    </div>
@endsection
