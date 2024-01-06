@extends('templates.site')
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">تعديل المعلومات الشخصية </h5>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-6 ">
              <label for="nomar_member" >الإسم الكامل بالعربية</label>
              <h4 class="fw-normal mb-1">{{ $member->nomar_member }}</h4>

            </div>
            <div class="col-6 ">
              <label for="nomfr_member">الإسم الكامل بالفرنسية</label>
              <h4 class="fw-normal mb-1">{{ $member->nomfr_member }}</h4>
            </div>
            <div class="col-6 mt-6">
              <label for="cin">رقم ب و</label>
              <h4 class="fw-normal mb-1">{{ $member->cin }}</h4>

            </div>
            <div class="col-6 mt-6">
              <label for="date_naiss">تاريخ الإزدياد</label>
              <h4 class="fw-normal mb-1">{{ \Carbon\Carbon::parse($member->date_naiss)->format('Y-m-d')}}</h4>

            </div>

            <div class="col-6 mt-3">
            <label for="banque" > نوع البنك</label>
            <h4 class="fw-normal mb-1">{{ $member->banque }}</h4>

          </div>
          <div class="col-6 mt-3">
            <label for="rib"></label>رقم الحساب </label>
            <h4 class="fw-normal mb-1">{{ $member->rib }}</h4>

          </div>
          <div class="col-12 mt-3">
            <label for="id_grademember"> الصفة  </label>
            <h4 class="fw-normal mb-1">{{ $member->id_grademember }}</h4>
        </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
@endsection

