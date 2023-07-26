@extends('templates.site')
@section('content')
<div class="card" dir="ltr">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">ALLOCATION FAMILLE</h5>
            <div class="form-group row  my-3">
              <div class="row">
              <div class="col-6 mt-3">
                <label for="nom_ar" >Nom fonctionnaire : </label>
                <input type="text" class="form-control" list="agents_list" id="list_agents"  autocomplete="off"  placeholder="Select fonctionnaire" value="" required >
              <datalist id="agents_list" >
                  <option data-id="" value="oualid elmerzougui" >
              </datalist> 
              </div>
              </div>
            <div class="row">
              <div class="col-6 mt-3">
                <label for="nom_ar" >Nom Fils : </label>
                <input type="text" class="form-control" id="inputEmail4" name="nom_ar" placeholder="">  
              </div>
              <div class="col-6 mt-3">
                <label for="nom_fr">Date Naissance</label>
                <input name="nom_fr" type="date" class="form-control" id="nom_fr" placeholder="">     
              </div>
              <div class="col-6 mt-3">
                <label for="nom_fr">Lieu Naissance</label>
                <input name="nom_fr" type="text" class="form-control" id="nom_fr" placeholder="">     
              </div>
              <div class="col-6 mt-3">
                <label for="nom_ar" > N° d’acte de naissance</label>
                <input type="text" class="form-control" id="inputEmail4" name="nom_ar" placeholder="">  
              </div>
              <div class="col-6 mt-3">
                <label for="nbr_enfant">Classement Fils</label>
                <input name="nbr_enfant" type="number" class="form-control" id="nbr_enfant" placeholder="">     
              </div> 
              <div class="col-6 mt-3">
                <label for="lieu_naiss" > Date de compter</label>
                <input name="lieu_naiss" type="date" class="form-control" id="lieu_naiss" placeholder="">  
              </div>
              
            <div class="btnsucc m-4 text-end">
              <button class="btn btn-success"><i class="ti ti-printer"></i> طباعة الوثائق </button>
            </div>
          </div>
        </div>


      </div>
        </div>
@endsection
