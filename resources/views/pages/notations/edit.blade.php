@extends('templates.site')
@section('content')
<div class="card">
    <form action="{{route('stagiaire.update')}}" method="post">
        @csrf
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4"> تعديل معلومات المتدرب </h5>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-6 mt-4">
                <label for="nom_stagiaire_ar" >إسم المتدرب بالعربية</label>
                <input type="text" class="form-control" id="nom_stagiaire_ar" name="nom_stagiaire_ar" value="{{$stagiaire->nom_stagiaire_ar}}" placeholder="">
              </div>
              <div class="col-6 mt-4">
                <label for="nom_stagiaire_fr"> إسم المتدرب بالفرنسية</label>
                <input name="nom_stagiaire_fr" type="text" class="form-control" id="nom_stagiaire_fr" value="{{$stagiaire->nom_stagiaire_fr}}" placeholder="">
              </div>
              <div class="col-6 mt-4">
                <label for="date_debut_stage" >تاريخ بداية التدريب</label>
                <input type="date" class="form-control" id="date_debut_stage" name="date_debut_stage" value="{{$stagiaire->date_debut_stage->format('Y-m-d')}}" placeholder="">
              </div>
              <div class="col-6 mt-4">
                <label for="date_fin_stage"> تاريخ نهاية التدريب</label>
                <input name="date_fin_stage" type="date" class="form-control" id="date_fin_stage" value="{{$stagiaire->date_fin_stage->format('Y-m-d')}}" placeholder="">
              </div>
              <div class="col-6 mt-4">
                <label for="direction_stagiaire">مؤسسة المتدرب</label>
                <input name="direction_stagiaire" type="text" class="form-control" id="direction_stagiaire" value="{{$stagiaire->direction_stagiaire}}" placeholder="">
              </div>
              <div class="col-6 mt-4">
                <label for="filiere_stagiaire">شعبة المتدرب</label>
                <input name="filiere_stagiaire" type="text" class="form-control" id="filiere_stagiaire" value="{{$stagiaire->filiere_stagiaire}}" placeholder="">
              </div>

            </div>
          </div>
        </div>

      </div>
      <div class="btnsimple text-start m-4 ">
        <button type="submit" class="btn btn-primary ">تعديل المعلومــات</button>
      </div>
    </form>
    </div>
@endsection
