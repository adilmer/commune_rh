@extends('templates.site')
@section('content')
<div class="card" style="direction: ltr">
    <form action="{{route('situationfamiliale.update_enfant')}}" enctype="multipart/form-data" method="post">
       @csrf

          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Editer enfant</h5>
            <div class="card">
              <div class="card-body">
                <div class="row">
                    <input type="hidden" class="form-control" id="id_enfant" value="{{$enfant->id_enfant }}" name="id_enfant" >

                    <div class="col-12 ">
                        <label for="combo_agent" > Nom et prénom de l'agent :</label>
        <input class="form-control" list="agents_list" id="list_agents"  value="{{$enfant->conjoint->agent->nom_fr }}"  disabled>
        <input type="hidden" class="form-control" id="id_agent" name="id_agent" placeholder=""  value="{{$enfant->conjoint->id_agent }}" required>

                      </div>
                  <div class="col-6 mt-4 ">
                    <label for="nom_cj" >Nom et prénom de conjont(e)  </label>
                    <input class="form-control" list="conjoints_list" id="list_conjoints"  value="{{$enfant->conjoint->nom_cj }}"   disabled>
                    <input type="hidden" class="form-control" id="id_conjoint" name="id_conjoint" placeholder=""  value="{{$enfant->id_conjoint }}" required>

                  </div>
                  <div class="col-6  mt-4">
                    <label for="nom_enfant" >Nom et prénom de l'enfant </label>
                    <input type="text" class="form-control" id="nom_enfant" value="{{$enfant->nom_enfant }}" name="nom_enfant" >
                  </div>
                  <div class="col-6  mt-4">
                    <label for="date_effet">date de naissance </label>
                    <input name="date_naiss" type="date" class="form-control" value="{{$enfant->date_naiss->format('Y-m-d') }}" id="date_naiss" placeholder="">
                  </div>
                  <div class="col-6  mt-4">
                    <label for="status_enfant" >Status de l'enfant </label>
                    <input type="text" class="form-control" id="status_enfant" value="{{$enfant->status_enfant }}" name="status_enfant" placeholder="Hadana,Infirmité,Arrêt sur demande,Décès enfant...">
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

