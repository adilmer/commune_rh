@extends('templates.site')
@section('content')
<div class="card">
    <form action="{{route('commission.save')}}" enctype="multipart/form-data" method="post">
        @csrf
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">لائحة وتواريخ اللجان جديدة </h5>
            <div class="card">
              <div class="card-body">
                <div class="row">
                    <div class="col-5"></div>
                  <div class="col-2  my-4">
                    <label  for="nom_formation_ar" >السنة</label>
                    <input type="number" class="form-control" id="nom_formation_ar" name="annee_commission" value="2024">
                  </div>
                  <div class="col-5"></div>
                <div class="alert alert-secondary" role="alert">
                <h2 class="card-title fw-semibold mt-4 text-center">هيئة متصرفي وزارة الداخلية</h2>
                </div>
                  <div class="col-4 my-4">
                    <label for="date_formation">تاريخ الهيئة</label>
                    <input name="date_commission[]" type="date" class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
                  </div>
                  <div class="col-4 my-4">
                    <label for="participantes"> تاريخ القرار </label>
                    <input name="date_arrete[]" type="date" class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
                </div>
                <div class="col-4 my-4">
                    <label for="participantes"> رقم القرار </label>
                    <input name="n_arrete[]" type="number" class="form-control" id="date_formation" placeholder="">
                </div>
                <div class="alert alert-secondary" role="alert">
                <h2 class="card-title fw-semibold mt-4 text-center">هيئة المتصرفين المشتركين</h2>
                </div>
                  <div class="col-4 my-4">
                    <label for="date_formation">تاريخ الهيئة</label>
                    <input name="date_commission[]" type="date" class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
                  </div>
                  <div class="col-4 my-4">
                    <label for="participantes"> تاريخ القرار </label>
                    <input name="date_arrete[]" type="date" class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
                </div>
                <div class="col-4 my-4">
                    <label for="participantes"> رقم القرار </label>
                    <input name="n_arrete[]" type="number" class="form-control" id="date_formation" placeholder="">
                </div>
                <div class="alert alert-secondary" role="alert">
                  <h2 class="card-title fw-semibold mt-4 text-center">هيئة التقنيين</h2>
                  </div>
                  <div class="col-4 my-4">
                    <label for="date_formation">تاريخ الهيئة</label>
                    <input name="date_commission[]" type="date"  class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
                  </div>
                  <div class="col-4 my-4">
                    <label for="participantes"> تاريخ القرار </label>
                    <input name="date_arrete[]" type="date" class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
                </div>
                <div class="col-4 my-4">
                    <label for="participantes"> رقم القرار </label>
                    <input name="n_arrete[]" type="number" class="form-control" id="date_formation" placeholder="">
                </div>
                <div class="alert alert-secondary" role="alert">
                    <h2 class="card-title fw-semibold mt-4 text-center">هيئة المحررين</h2>
                  </div>
                  <div class="col-4 my-4">
                    <label for="date_formation">تاريخ الهيئة</label>
                    <input name="date_commission[]" type="date" class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
                  </div>
                  <div class="col-4 my-4">
                    <label for="participantes"> تاريخ القرار </label>
                    <input name="date_arrete[]" type="date" class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
                </div>
                <div class="col-4 my-4">
                    <label for="participantes"> رقم القرار </label>
                    <input name="n_arrete[]" type="number" class="form-control" id="date_formation" placeholder="">
                </div>
                <div class="alert alert-secondary" role="alert">
                    <h2 class="card-title fw-semibold mt-4 text-center">هيئة المساعدين التقنيين</h2>
                  </div>
                  <div class="col-4 my-4">
                    <label for="date_formation">تاريخ الهيئة</label>
                    <input name="date_commission[]" type="date" class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
                  </div>
                  <div class="col-4 my-4">
                    <label for="participantes"> تاريخ القرار </label>
                    <input name="date_arrete[]" type="date" class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
                </div>
                <div class="col-4 my-4">
                    <label for="participantes"> رقم القرار </label>
                    <input name="n_arrete[]" type="number" class="form-control" id="date_formation" placeholder="">
                </div>
                <div class="alert alert-secondary" role="alert">
                  <h2 class="card-title fw-semibold mt-4 text-center">هيئة المساعدين الإداريين</h2>
                </div>
                <div class="col-4 my-4">
                  <label for="date_formation">تاريخ الهيئة</label>
                  <input name="date_commission[]" type="date" class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
                </div>
                <div class="col-4 my-4">
                  <label for="participantes"> تاريخ القرار </label>
                  <input name="date_arrete[]" type="date" class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
              </div>
              <div class="col-4 my-4">
                  <label for="participantes"> رقم القرار </label>
                  <input name="n_arrete[]" type="number" class="form-control" id="date_formation" placeholder="">
              </div>
              <div class="alert alert-secondary" role="alert">
                <h2 class="card-title fw-semibold mt-4 text-center">هيئة المهندسين</h2>
                </div>
                <div class="col-4 my-4">
                  <label for="date_formation">تاريخ الهيئة</label>
                  <input name="date_commission[]" type="date"  class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
                </div>
                <div class="col-4 my-4">
                  <label for="participantes"> تاريخ القرار </label>
                  <input name="date_arrete[]" type="date" class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
              </div>
              <div class="col-4 my-4">
                  <label for="participantes"> رقم القرار </label>
                  <input name="n_arrete[]" type="number" class="form-control" id="date_formation" placeholder="">
              </div>
              <div class="alert alert-secondary" role="alert">
                <h2 class="card-title fw-semibold mt-4 text-center">هيئة الممرضين وتقنيي الصحة</h2>
                </div>
                <div class="col-4 my-4">
                  <label for="date_formation">تاريخ الهيئة</label>
                  <input name="date_commission[]" type="date"  class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
                </div>
                <div class="col-4 my-4">
                  <label for="participantes"> تاريخ القرار </label>
                  <input name="date_arrete[]" type="date" class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
              </div>
              <div class="col-4 my-4">
                  <label for="participantes"> رقم القرار </label>
                  <input name="n_arrete[]" type="number" class="form-control" id="date_formation" placeholder="">
              </div>
              <div>
              <h2 class="card-title fw-semibold mt-4 text-center">هيئة الاطباء والصيادلة  </h2>
            </div>
            <div class="col-4 my-4">
              <label for="date_formation">تاريخ الهيئة</label>
              <input name="date_commission[]" type="date"  class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
            </div>
            <div class="col-4 my-4">
              <label for="participantes"> تاريخ القرار </label>
              <input name="date_arrete[]" type="date" class="form-control" id="date_formation" placeholder="" value="{{ now()->format('Y-m-d') }}">
          </div>
          <div class="col-4 my-4">
              <label for="participantes"> رقم القرار </label>
              <input name="n_arrete[]" type="number" class="form-control" id="date_formation" placeholder="">
          </div>
              </div>
            </div>

          </div>
          <div class="btnsimple text-start m-4 ">
            <button type="submit" class="btn btn-primary ">حفط المعلومــات</button>
          </div>
        </form>
        </div>
@endsection

