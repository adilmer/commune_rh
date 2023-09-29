@extends('templates.site')
@section('content')
<div class="card">
    <form action="{{route('stagiaire.save')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">إضافة دورة جديدة</h5>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-6 mt-4">
                <label for="nom_stagiaire_ar" >سنة الدورة</label>
                <input type="text" class="form-control" id="nom_stagiaire_ar" name="nom_stagiaire_ar" placeholder="">
              </div>
              <div class="col-6 mt-4">
                <label for="nom_stagiaire_fr"> تاريخ إجراء الإمتحان</label>
                <input type="date" class="form-control" id="date_debut_stage" name="date_debut_stage" placeholder="">
              </div>
              <div class="col-6 mt-4">
                <label for="date_debut_stage" >مكان إجراء الإمتحان  </label>
                <input name="nom_stagiaire_fr" type="text" class="form-control text-uppercase" id="nom_stagiaire_fr" placeholder="">
              </div>
              <div class="col-6 mt-4">
                <label for="date_fin_stage"> أخر إجل إستلام الملفات  </label>
                <input name="date_fin_stage" type="date" class="form-control" id="date_fin_stage" placeholder="">
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
