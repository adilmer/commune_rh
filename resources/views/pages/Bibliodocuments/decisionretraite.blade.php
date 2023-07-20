@extends('templates.site')
@section('content')
<div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">الوثائق الخاصة بملف التقاعد</h5>
            <div class="row">
              <div class="col-6 mt-3">
                <label for="nom_ar" >إسم الأب بالعربية </label>
                <input type="text" class="form-control" id="inputEmail4" name="nom_ar" placeholder="">  
              </div>
              <div class="col-6 mt-3">
                <label for="nom_fr">إسم الأب بالفرنسية</label>
                <input name="nom_fr" type="text" class="form-control" id="nom_fr" placeholder="">     
              </div>
              <div class="col-6 mt-3">
                <label for="nom_ar" >إسم الأم بالعربية </label>
                <input type="text" class="form-control" id="inputEmail4" name="nom_ar" placeholder="">  
              </div>
              <div class="col-6 mt-3">
                <label for="nom_fr">إسم الأم بالفرنسية</label>
                <input name="nom_fr" type="text" class="form-control" id="nom_fr" placeholder="">     
              </div>
              <div class="col-6 mt-3">
                <label for="nbr_enfant">إسم الزوج(ة) </label>
                <input name="nbr_enfant" type="text" class="form-control" id="nbr_enfant" placeholder="">     
              </div> 
              <div class="col-6 mt-3">
                <label for="lieu_naiss" >تاريخ إزدياد الزوج(ة) </label>
                <input name="lieu_naiss" type="date" class="form-control" id="lieu_naiss" placeholder="">  
              </div>
              <div class="col-6 mt-3">
                <label for="date_naiss">تاريخ الزواج </label>
                <input name="date_naiss" type="date" class="form-control" id="date_naiss" placeholder="">     
              </div> 
              <div class="col-6 mt-3">
                <label for="tel">  مهنة الزوج(ة)</label>
                <input name="tel" type="text" class="form-control" id="tel" placeholder="">  
              </div>
              
            </div>
            <div class="btnsucc m-4 text-start">
              <button class="btn btn-success"><i class="ti ti-printer"></i> طباعة الوثائق </button>
            </div>
          </div>
        </div>
@endsection
