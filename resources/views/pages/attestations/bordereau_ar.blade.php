@extends('templates.site')
@section('content')
    <div class="row mt-5" style="justify-content: flex-end">
        <div class="row">
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">معلومات ورقة الإرسال</h5>
                <div class="col-10">
                    <div class="form-group row  my-3">
                        <label class="form-check-label  fs-5 pt-2 col-3" for="nom_agent" > المرسل إليه :</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control col-5" list="agents_list"  placeholder="تحديد المعني بالأمر"  >
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
@endsection
