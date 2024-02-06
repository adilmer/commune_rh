@extends('templates.site')
@section('content')
<div class="card" style="direction: ltr">>
    <form action="{{route('situationfamiliale.update')}}" enctype="multipart/form-data" method="post">
        @csrf
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Editer conjont(e)</h5>
            <div class="card">
              <div class="card-body">
                <div class="row">
                    <input type="hidden" class="form-control" id="id_conjoint" value="{{$conjoint->id_conjoint }}" name="id_conjoint" >
                    <div class="col-12 ">
                        <label for="combo_agent" > Nom et prénom de l'agent :</label>
        <input class="form-control" list="agents_list" id="list_agents" value="{{$conjoint->agent->nom_fr}}"  disabled>
        <input type="hidden" class="form-control" id="id_agent" name="id_agent" placeholder="" value="{{$conjoint->agent->id_agent}}" required>
                      </div>
                  <div class="col-6 mt-4 ">
                    <label for="nom_cj" >Nom et prénom de conjont(e)  </label>
                    <input type="text" class="form-control" id="nom_cj" value="{{$conjoint->nom_cj}}" name="nom_cj" placeholder="">
                  </div>
                  <div class="col-6  mt-4">
                    <label for="cin_cj" >CIN de conjont(e)  </label>
                    <input type="text" class="form-control" id="cin_cj" value="{{$conjoint->cin_cj}}" name="cin_cj" placeholder="">
                  </div>
                  <div class="col-6  mt-4">
                    <label for="status_conjoint" >Motif d'effet (mariage,remariage,divorce...)  </label>
                    <input type="text" class="form-control" id="status_conjoint" value="{{$conjoint->status_conjoint}}" name="status_conjoint" placeholder="mariage,remariage,divorce...">
                  </div>
                  <div class="col-6  mt-4">
                    <label for="date_effet">date d'effet (mariage,remariage,divorce...) </label>
                    <input name="date_effet" type="date" class="form-control" value="{{$conjoint->date_effet->format('Y-m-d')}}" id="date_effet" placeholder="">
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

