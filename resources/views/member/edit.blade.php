@extends('templates.site')
@section('content')

<form action="{{route('member.update')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">تعديل المعلومات الشخصية </h5>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-6 ">
                <input type="hidden" name="id_member" value="{{$member->id_member}}">
              <label for="nomar_member" >الإسم الكامل بالعربية</label>
              <input type="text" class="form-control" id="nomar_member" name="nomar_member" value="{{$member->nomar_member}}" placeholder="">
            </div>
            <div class="col-6 ">
              <label for="nomfr_member">الإسم الكامل بالفرنسية</label>
              <input name="nomfr_member" type="text" class="form-control" id="nomfr_member" value="{{$member->nomfr_member}}" placeholder="">
            </div>
            <div class="col-6 mt-6">
              <label for="cin">رقم ب و</label>
              <input name="cin" type="text" class="form-control" id="cin" value="{{$member->cin}}" placeholder="" >
            </div>
            <div class="col-6 mt-6">
              <label for="date_naiss">تاريخ الإزدياد</label>
              <input name="date_naiss" type="date" class="form-control" value="{{ \Carbon\Carbon::parse($member->date_naiss)->format('Y-m-d')}}" id="date_naiss" placeholder="">
            </div>

            <div class="col-6 mt-3">
            <label for="banque" > نوع البنك</label>
            <input name="banque" type="text" class="form-control" id="banque" value="{{$member->banque}}" placeholder="">
          </div>
          <div class="col-6 mt-3">
            <label for="rib"></label>رقم الحساب </label>
            <input style=" text-align: end;  direction: ltr;" name="rib" type="text" class="form-control" id="rib" value="{{$member->rib}}" placeholder="">
          </div>
          <div class="col-12 mt-3">
            <label for="id_grademember"> الصفة  </label>
            <select id="id_grademember" name="id_grade" class="custom-select custom-select-lg mb-3 form-control">
                <option value="0" disabled>اختر الصفة</option>
                @foreach ($grademembres as $grademembres)
                <option value="{{$grademembres->id_grademembre}}" {{ $member->id_grademembre == $grademembres->id_grademembre ? 'selected':'' }}>{{$grademembres->nomar_grade}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 mt-3">
            <label for="status_member"> الوضعية الحالية  </label>
            <select id="status_member" name="status_member" class="custom-select custom-select-lg mb-3 form-control">
                <option value="0" {{ $member->status_member == 0 ? 'selected':'' }}>غير متواجد</option>
                <option value="1" {{ $member->status_member == 1 ? 'selected':'' }}>متواجد</option>
            </select>
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

