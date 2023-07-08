@extends('templates.site')
@section('content')
<div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">تكوين جديد </h5>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-6 ">
                    <label for="nom_formation_ar" >موضوع التكوين  </label>
                    <input type="text" class="form-control" id="nom_formation_ar" name="nom_formation_ar" placeholder="">  
                  </div>
                  <div class="col-6 ">
                    <label for="date_formation">تاريخ التكوين</label>
                    <input name="date_formation" type="date" class="form-control" id="date_formation" placeholder="">     
                  </div>
                  <div class="col-12 mt-4">
                    <label for="participantes">المستفيدين من التكوين</label>
                    <textarea class="form-control"id="participantes" name="participantes"  rows="4"></textarea>
                  </div>  
                  <div class="col-12 mt-4">
                    <label for="path_formation" >رسالة التكوين </label>
                    <input name="path_formation" type="file" class="form-control" id="path_formation" placeholder="">  
                  </div>
                </div>
              </div>
            </div>
           
          </div>
          <div class="btnsimple text-start m-4 ">
            <button class="btn btn-primary ">تـأكيد المعلومــات</button>
          </div>
        </div> 
@endsection
