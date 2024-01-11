@extends('templates.site')
@section('content')

<form action="{{route('agent.save')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">المعلومات الشخصية</h5>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-6 ">
              <label for="nom_ar" >الإسم الكامل بالعربية</label>
              <input type="text" class="form-control" id="nom_ar" name="nom_ar" placeholder="">
            </div>
            <div class="col-6 ">
              <label for="nom_fr">الإسم الكامل بالفرنسية</label>
              <input name="nom_fr" type="text" class="form-control" id="nom_fr" placeholder="">
            </div>
            <div class="col-4 mt-3">
              <label for="sexe" >الجنس</label>
              <select name="sexe" class="form-control custom-select custom-select-lg mb-3">
                <option value="Masculin" selected>ذكر</option>
                <option value="Féminin">أنثى</option>
              </select>
            </div>
            <div class="col-4 mt-3">
              <label for="situation_fam">الحالة العائلية</label>
              <select name="situation_fam" class="custom-select custom-select-lg mb-3 form-control">
                <option value="Célibataire" selected>عازب(ة)</option>
                <option value="Marié" >متزوج(ة)</option>
                <option value="Divorcé">مطلق(ة)</option>
                <option value="Veuf">أرمل(ة)</option>
              </select>
            </div>
            <div class="col-4 mt-3">
              <label for="nbr_enfant">عدد الأبناء</label>
              <input name="nbr_enfant" type="number" class="form-control" id="nbr_enfant" placeholder="" value="0">
            </div>
            <div class="col-3 mt-3">
                <label for="lieu_naiss"> مكان الإزدياد بالعربية</label>
                <input  name="lieu_naiss_ar" type="text" class="form-control" id="lieu_naiss_ar" placeholder="">
              </div>
            <div class="col-3 mt-3">
              <label for="lieu_naiss" >مكان الإزدياد بالفرنسية</label>
              <input name="lieu_naiss" type="text" class="form-control" id="lieu_naiss" placeholder="">
            </div>
            <div class="col-3 mt-3">
              <label for="date_naiss">تاريخ الإزدياد</label>
              <input name="date_naiss" type="date" class="form-control" id="date_naiss" placeholder="">
            </div>
            <div class="col-3 mt-3">
              <label for="tel">  الهاتف</label>
              <input name="tel" type="text" class="form-control" id="tel" placeholder="">
            </div>
            <div class="col-6 mt-3">
            <label for="adresse_ar" >العنوان بالعربية</label>
            <input name="adresse_ar" type="text" class="form-control" id="adresse_ar" placeholder="">
          </div>
          <div class="col-6 mt-3">
            <label for="adresse_fr"></label>العنوان بالفرنسية</label>
            <input name="adresse_fr" type="text" class="form-control" id="adresse_fr" placeholder="">
          </div>
            <div class="col mt-3">
              <label for="photo" >الصورة الشخصية</label>
              <input name="photo" type="file" class="form-control" id="photo" placeholder="" accept="image/*">
            </div>
          </div>
        </div>
      </div>
      <h5 class="card-title fw-semibold mb-4">المعلومات الوظيفية</h5>
      <div class="card mb-0">
        <div class="card-body">
          <div class="row">
            <div class="col-4 mt-3">
                <label for="ppr" >PPR</label>
                <input name="ppr" type="text" class="form-control" id="ppr" placeholder="" required>
              </div>
              <div class="col-4 mt-3">
                <label for="mat">MAT</label>
                <input name="mat" type="text" class="form-control" id="mat" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="cin">رقم البطاقة الوطنية</label>
                <input name="cin" type="text" class="form-control" id="cin" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="id_grade" >الدرجة</label>
                <select id="id_grade" name="id_grade" class="custom-select custom-select-lg mb-3 form-control">
                    <option value="0"></option>
                    @foreach ($grades as $grades)
                    <option value="{{$grades->id_grade}}">{{$grades->nom_grade_ar}}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-4 mt-3">
                <label for="date_grade" >تاريخ التعيين في الدرجة</label>
                <input name="date_grade" type="date"  class="form-control" id="date_grade" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="echelle" >السلم</label>
                <input name="echelle" type="text" class="form-control" id="echelle" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="echellon">الرتبة</label>
                <input name="echellon" type="number" class="form-control" id="echellon" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="indice">الرقم الاستدلالي</label>
                <input name="indice" type="number" class="form-control" id="indice" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="id_fonction">المنصب الإداري</label>
                <select id="id_fonction" name="id_fonction" class="custom-select custom-select-lg mb-3 form-control">
                    @foreach ($fonctions as $fonctions)
                    <option value="{{$fonctions->id_fonction}}">{{$fonctions->nom_fonction_ar}}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-6 mt-3">
                <label for="departements">القسم</label>
                <select id="departements" class="custom-select custom-select-lg mb-3 form-control">
                    <option value="0" disabled selected>اختر قسم</option>
                    @foreach ($departements as $departements)
                    <option value="{{$departements->id_departement}}">{{$departements->nom_departement_ar}}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-6 mt-3">
                <label for="nom_service_ar">المصلحة</label>
                <select id="services" class="custom-select custom-select-lg mb-3 form-control">
                </select>
              </div>

              <div class="col-4 mt-3">
                <label for="id_bureau">المكتب</label>
                <select id="id_bureau" name="id_bureau" class="custom-select custom-select-lg mb-3 form-control">

                </select>
              </div>
              <div class="col-4 mt-3">
                <label for="date_rec">تاريخ التوظيف</label>
                <input name="date_rec" type="date" class="form-control" id="date_rec" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="date_tuto">تاريخ الترسيم</label>
                <input name="date_tuto" type="date" class="form-control" id="date_tuto" placeholder="">
              </div>
              <div class="col-8 mt-3">
                <label for="rib">رقم الحساب البنكي </label>
                <input name="rib" type="text" class="form-control" id="rib" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="agence">Agence</label>
                <input name="agence" type="text" class="form-control" id="agence" placeholder="">
              </div>

              <div class="col-3 mt-3">
                <label for="n_affilation" >رقم التعاضدية  </label>
                <input name="n_affilation" type="text" class="form-control" id="n_affilation" placeholder="">
              </div>
              <div class="col-3 mt-3">
                <label for="aff_mutuelle">نوع الإنخراط</label>
                <select name="aff_mutuelle" class="custom-select custom-select-lg mb-3 form-control">
                  <option selected>General</option>
                  <option selected>omfam</option>
                </select>
              </div>
              <div class="col-3 mt-3">
                <label for="aff_cmr" >CMR رقم الإنخراط </label>
                <input name="aff_cmr" type="text" class="form-control" id="aff_cmr" placeholder="">
              </div>
              <div class="col-3 mt-3">
                <label for="rcar" >RCAR رقم الإنخراط </label>
                <input name="rcar" type="text" class="form-control" id="rcar" placeholder="">
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
@section('script')


    $("#departements").on("click", function(){
        $id = this.value
        $url = "{{ route('service.filter_departement') }}"
        $("#services").html("");
         get_ajax($id,$url,"#services")
        });

    $("#services").on("click", function(){
            $id = this.value
            $url = "{{ route('service.filter_service') }}"
            $("#id_bureau").html("");
             get_ajax($id,$url,"#id_bureau")
            });


@endsection
