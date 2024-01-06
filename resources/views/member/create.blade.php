@extends('templates.site')
@section('content')

<form action="{{route('member.save')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">المعلومات الشخصية</h5>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-6 ">
              <label for="nomar_member" >الإسم الكامل بالعربية</label>
              <input type="text" class="form-control" id="nomar_member" name="nomar_member" placeholder="">
            </div>
            <div class="col-6 ">
              <label for="nomfr_member">الإسم الكامل بالفرنسية</label>
              <input name="nomfr_member" type="text" class="form-control" id="nomfr_member" placeholder="">
            </div>
            <div class="col-6 mt-6">
              <label for="cin">رقم ب و</label>
              <input name="cin" type="text" class="form-control" id="cin" placeholder="" >
            </div>
            <div class="col-6 mt-6">
              <label for="date_naiss">تاريخ الإزدياد</label>
              <input name="date_naiss" type="date" class="form-control" id="date_naiss" placeholder="">
            </div>

            <div class="col-6 mt-3">
            <label for="banque" > نوع البنك</label>
            <input name="banque" type="text" class="form-control" id="banque" placeholder="">
          </div>
          <div class="col-6 mt-3">
            <label for="rib"></label>رقم الحساب </label>
            <input name="rib" type="text" class="form-control" id="rib" placeholder="">
          </div>
          <div class="col-12 mt-3">
            <label for="id_grademember"> الصفة  </label>
            <input name="id_grademember" type="text" class="form-control" id="id_grademember" placeholder="">
          </div>
          </div>
        </div>
      </div>

    </div>
    <div class="btnsimple text-start m-4 ">
      <button type="submit" class="btn btn-primary">حفظ المعلومــات</button>
    </div>
  </div>

</form>
</div>
@endsection

