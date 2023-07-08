@extends('templates.site')
@section('content')
<div class="card">
    <form action="{{route('formation.update')}}" method="post">
        @csrf
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">تعديل التكوين</h5>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-6 ">
                    <label for="nom_formation_ar" >موضوع التكوين  </label>
                    <input type="text" class="form-control" id="nom_formation_ar" value="{{$formation->nom_formation_ar}}" name="nom_formation_ar" placeholder="">
                    <input type="hidden" class="form-control" id="id_formation" value="{{$formation->id_formation}}" name="id_formation" placeholder="">
                  </div>
                  <div class="col-6 ">
                    <label for="date_formation">تاريخ التكوين</label>
                    <input name="date_formation" type="date" class="form-control" value="{{$formation->date_formation->format('Y-m-d')}}" id="date_formation" placeholder="">
                  </div>
                  <div class="col-12 mt-4">
                    <label for="participantes">المستفيدين من التكوين</label>
                    <textarea class="form-control" id="participantes" name="participantes" rows="4">{{$formation->participantes}}</textarea>
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
