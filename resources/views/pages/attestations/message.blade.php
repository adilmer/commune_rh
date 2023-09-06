@extends('templates.site')
@section('content')
<form action="{{route('attestation.export_word_message')}}" method="get">
    @csrf
<div>
    <div class="row mt-5" style="justify-content: flex-end">
        <div class="row">
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">معلومات ورقة الإرسال</h5>
                <div class="col-10">
                    <div class="form-group row  my-3">
                        <label class="form-check-label  fs-5 pt-2 col-3"id="destinataire" name="destinataire" for="nom_agent" > المرسل إليه :</label>
                    <div class="col-sm-9">
                    <input type="text" id="destinataire" name="destinataire" class="form-control col-5" list="agents_list"  placeholder="تحديد المعني بالأمر"  >
                    </div>
                    </div>
                    <div class="form-group row  my-3">
                        <label class="form-check-label  fs-5 pt-2 col-3" id="object" name="object" for="nom_agent" > الموضوع  :</label>
                    <div class="col-sm-9">
                    <input type="text" id="object" name="object" class="form-control col-5" list="agents_list"  placeholder="موضوع المراسلة  "  >
                    </div>
                    </div>
                    <div class="form-group row  my-3">
                        <label class="form-check-label  fs-5 pt-2 col-3" id="ref" name="ref" for="nom_agent" > المرجع  :</label>
                    <div class="col-sm-9">
                    <input type="text" id="ref" name="ref" class="form-control col-5" list="agents_list"  placeholder="مرجع المراسلة  "  >
                    </div>
                    </div>
                    <div class="form-group row  my-3">
                        <label class="form-check-label  fs-5 pt-2 col-3" id="message" name="message" for="nom_agent" > نص المراسلة  :</label>
                    <div class="col-sm-9">
                        <textarea  class="form-control"id="message" name="message"  rows="4"></textarea>
                    </div>
                    </div>
              </div>
              <div class=" m-4 text-start">
                <button  type="submit"  class="btn btn-success"><i class="ti ti-printer"></i> طبــاعـة  </button>
              </div>
            </div>
          </div>
        </div>


      </div>
</div>
</div>
</form>
@endsection
