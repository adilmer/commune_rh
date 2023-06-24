@extends('templates.site')
@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">المعلومات الشخصية</h5>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-6 mt-3">
              <label for="nom_ar" >الإسم الكامل بالعربية</label>
              <input type="text" class="form-control" id="inputEmail4" name="nom_ar" placeholder="">
            </div>
            <div class="col-6 mt-3">
              <label for="nom_fr">الإسم الكامل بالفرنسية</label>
              <input name="nom_fr" type="text" class="form-control" id="nom_fr" placeholder="">
            </div>
            <div class="col-4 mt-3">
              <label for="sexe" >الجنس</label>
              <select name="sexe" class="form-control custom-select custom-select-lg mb-3">
                <option selected>ذكر</option>
                <option >أنثى</option>
              </select>
            </div>
            <div class="col-4 mt-3">
              <label for="situation_fam">الحالة العائلية</label>
              <select name="situation_fam" class="custom-select custom-select-lg mb-3 form-control">
                <option selected>عازب(ة)</option>
                <option >متزوج(ة)</option>
                <option >مطلق(ة)</option>
              </select>
            </div>
            <div class="col-4 mt-3">
              <label for="nbr_enfant">عدد الأبناء</label>
              <input name="nbr_enfant" type="number" class="form-control" id="nbr_enfant" placeholder="">
            </div>
            <div class="col-4 mt-3">
              <label for="lieu_naiss" >مكان الإزدياد</label>
              <input name="lieu_naiss" type="text" class="form-control" id="lieu_naiss" placeholder="">
            </div>
            <div class="col-4 mt-3">
              <label for="date_naiss">تاريخ الإزدياد</label>
              <input name="date_naiss" type="date" class="form-control" id="date_naiss" placeholder="">
            </div>
            <div class="col-4 mt-3">
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
              <input name="photo" type="file" class="form-control" id="photo" placeholder="">
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
                <input name="ppr" type="text" class="form-control" id="ppr" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="mat">MAT</label>
                <input name="mat" type="text" class="form-control" id="mat" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="cin">رقم البطاقة الوطنية</label>
                <input name="cin" type="text" class="form-control" id="cin" placeholder="">
              </div>
              <div class="col-3 mt-3">
                <label for="nom_grade_ar" >الدرجة</label>
                <input name="nom_grade_ar" type="text" class="form-control" id="nom_grade_ar" placeholder="">
              </div>
              <div class="col-3 mt-3">
                <label for="date_grade" >تاريخ التعيين في الدرجة</label>
                <input name="date_grade" type="date" class="form-control" id="date_grade" placeholder="">
              </div>
              <div class="col-3 mt-3">
                <label for="echl" >السلم</label>
                <input name="echl" type="text" class="form-control" id="echl" placeholder="">
              </div>
              <div class="col-3 mt-3">
                <label for="date_grade" >تاريخ التعيين في السلم</label>
                <input name="date_grade" type="date" class="form-control" id="date_grade" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="echellon">الرتبة</label>
                <input name="echellon" type="text" class="form-control" id="echellon" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="indice">الرقم الاستدلالي</label>
                <input name="indice" type="text" class="form-control" id="indice" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="date_ret">تاريخ الإحالة على التقاعد</label>
                <input name="date_ret" type="date" class="form-control" id="date_ret" placeholder="">
              </div>
              <div class="col-6 mt-3">
                <label for="nom_service_ar">المصلحة</label>
                <select name="nom_service_ar" class="custom-select custom-select-lg mb-3 form-control">
                  <option selected>المصلحة</option>
                </select>
              </div>
              <div class="col-6 mt-3">
                <label for="nom_departement_ar">القسم</label>
                <select name="nom_departement_ar" class="custom-select custom-select-lg mb-3 form-control">
                  <option selected>القسم</option>
                </select>
              </div>
              <div class="col-6 mt-3">
                <label for="nom_bureau_ar">المكتب</label>
                <select name="nom_bureau_ar" class="custom-select custom-select-lg mb-3 form-control">
                  <option selected>المكتب</option>
                </select>
              </div>
              <div class="col-6 mt-3">
                <label for="date_rec">تاريخ الترسيم</label>
                <input name="date_rec" type="date" class="form-control" id="date_rec" placeholder="">
              </div>

              <div class="col-8 mt-3">
                <label for="rib">رقم الحساب البنكي</label>
                <input name="rib" type="text" class="form-control" id="rib" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="agence">Agence</label>
                <input name="agence" type="text" class="form-control" id="agence" placeholder="">
              </div>

              <div class="col-4 mt-3">
                <label for="n_affilation" >رقم التعاضدية  </label>
                <input name="n_affilation" type="text" class="form-control" id="n_affilation" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="aff_mutuelle">نوع الإنخراط</label>
                <select name="aff_mutuelle" class="custom-select custom-select-lg mb-3 form-control">
                  <option selected>General</option>
                  <option selected>omfam</option>
                </select>
              </div>
              <div class="col-4 mt-3">
                <label for="aff_cmr" >CMR رقم الإنخراط </label>
                <input name="aff_cmr" type="text" class="form-control" id="aff_cmr" placeholder="">
              </div>



          </div>
        </div>
      </div>
    </div>
    <div class="btnsimple text-start mb-4 ">
      <button class="btn btn-primary">تعديــل المعلومــات</button>
    </div>
  </div>


</div>
@endsection
