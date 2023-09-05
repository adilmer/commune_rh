@extends('templates.site')
@section('content')
<div dir="ltr">
    <div class="row mt-8" style="justify-content: flex-end">
        <div class="row">
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Informations de bordereau</h5>
                <div class="col-10">
                    <div class="form-group row  my-3">
                        <label class="form-check-label  fs-5 pt-2 col-4" for="nom_agent" > le destinataire  :</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control col-10" list="agents_list"  placeholder="destinataire  "  >
                    </div>
                    </div>
              </div>
              <div class=" m-4 text-end">
                <button  type="submit"  class="btn btn-success"><i class="ti ti-printer"></i> Imprimer  </button>
              </div>
            </div>
          </div>
        </div>


      </div>
</div>
</div>
@endsection
