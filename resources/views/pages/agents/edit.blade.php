@extends('templates.site')
@section('content')

<form action="{{route('agent.update')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">المعلومات الشخصية</h5>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <label for="nom_ar" >الإسم الكامل بالعربية</label>
              <input type="text" class="form-control" id="nom_ar" value="{{$agent->nom_ar}}" name="nom_ar" placeholder="">
            </div>
            <input type="hidden" name="id_agent" value="{{$agent->id_agent}}">
            <div class="col-6 ">
              <label for="nom_fr">الإسم الكامل بالفرنسية</label>
              <input value="{{$agent->nom_fr}}" name="nom_fr" type="text" class="form-control" id="nom_fr" placeholder="">
            </div>
            <div class="col-4 mt-3">
              <label for="sexe" >الجنس</label>
              <select name="sexe" class="form-control custom-select custom-select-lg mb-3">
                <option value="Masculin" {{ $agent->sexe == 'Masculin' ? 'selected' : '' }}>ذكر</option>
                <option value="Féminin" {{ $agent->sexe == 'Féminin' ? 'selected' : '' }}>أنثى</option>
              </select>
            </div>
            <div class="col-4 mt-3">
              <label for="situation_fam">الحالة العائلية</label>
              <select name="situation_fam" class="custom-select custom-select-lg mb-3 form-control" value="{{$agent->situation_fam}}">
                <option value="Célibataire" {{ $agent->situation_fam == 'Célibataire' ? 'selected' : '' }}>عازب(ة)</option>
                <option value="Marié" {{ $agent->situation_fam == 'Marié' ? 'selected' : '' }} >متزوج(ة)</option>
                <option value="Divorcé" {{ $agent->situation_fam == 'Divorcé' ? 'selected' : '' }}>مطلق(ة)</option>
                <option value="Veuf" {{ $agent->situation_fam == 'Veuf' ? 'selected' : '' }}>أرمل(ة)</option>
              </select>
            </div>
            <div class="col-4 mt-3">
              <label for="nbr_enfant">عدد الأبناء</label>
              <input value="{{$agent->nbr_enfant}}" name="nbr_enfant" type="number" class="form-control" id="nbr_enfant" placeholder="" >
            </div>
            <div class="col-4 mt-3">
              <label for="lieu_naiss" >مكان الإزدياد</label>
              <input value="{{$agent->lieu_naiss}}" name="lieu_naiss" type="text" class="form-control" id="lieu_naiss" placeholder="">
            </div>
            <div class="col-4 mt-3">
              <label for="date_naiss">تاريخ الإزدياد</label>
              <input value="{{ \Carbon\Carbon::parse($agent->date_naiss)->format('Y-m-d') }}" name="date_naiss" type="date" class="form-control" id="date_naiss" placeholder="">
            </div>
            <div class="col-4 mt-3">
              <label for="tel">  الهاتف</label>
              <input value="{{$agent->tel}}" name="tel" type="text" class="form-control" id="tel" placeholder="">
            </div>
            <div class="col-6 mt-3">
            <label for="adresse_ar" >العنوان بالعربية</label>
            <input value="{{$agent->adresse_ar}}" name="adresse_ar" type="text" class="form-control" id="adresse_ar" placeholder="">
          </div>
          <div class="col-6 mt-3">
            <label for="adresse_fr"></label>العنوان بالفرنسية</label>
            <input value="{{$agent->adresse_fr}}" name="adresse_fr" type="text" class="form-control" id="adresse_fr" placeholder="">
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
                <input value="{{$agent->ppr}}" name="ppr" type="text" class="form-control" id="ppr" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="mat">MAT</label>
                <input value="{{$agent->mat}}" name="mat" type="text" class="form-control" id="mat" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="cin">رقم البطاقة الوطنية</label>
                <input value="{{$agent->cin}}" name="cin" type="text" class="form-control" id="cin" placeholder="">
              </div>
              <div class="col-3 mt-3">
                <label for="id_grade" >الدرجة</label>
                <select id="id_grade" name="id_grade" class="custom-select custom-select-lg mb-3 form-control">
                    <option value="0" disabled>اختر درجة</option>
                    @foreach ($grades as $grades)
                    <option value="{{$grades->id_grade}}" {{ $agent->id_grade == $grades->id_grade ? 'selected' : '' }}>{{$grades->nom_grade_ar}}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-3 mt-3">
                <label for="date_grade" >تاريخ التعيين في الدرجة</label>
                <input value="{{ \Carbon\Carbon::parse($agent->date_grade)->format('Y-m-d') }}" name="date_grade" type="date" class="form-control" id="date_grade" placeholder="">
              </div>
              <div class="col-3 mt-3">
                <label for="echelle" >السلم</label>
                <input value="{{$agent->echelle}}" name="echelle" type="text" class="form-control" id="echelle" placeholder="">
              </div>
              {{-- <div class="col-3 mt-3">
                <label for="date_grade" >تاريخ التعيين في السلم</label>
                <input value="{{ \Carbon\Carbon::parse($agent->date_grade}}" name="date_grade" type="date" class="form-control" id="date_grade" placeholder="">
              </div> --}}
              <div class="col-4 mt-3">
                <label for="echellon">الرتبة</label>
                <input value="{{$agent->echellon}}" name="echellon" type="number" class="form-control" id="echellon" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="indice">الرقم الاستدلالي</label>
                <input value="{{$agent->indice}}" name="indice" type="number" class="form-control" id="indice" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="id_fonction">المنصب الإداري</label>
                <select id="id_fonction" name="id_fonction" class="custom-select custom-select-lg mb-3 form-control">
                    @foreach ($fonctions as $fonctions)
                    <option value="{{$fonctions->id_fonction}}" {{ $agent->id_fonction == $fonctions->id_fonction ? 'selected' : '' }}>{{$fonctions->nom_fonction_ar}}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-6 mt-3">
                <label for="departements">القسم</label>
                <select id="departements" class="custom-select custom-select-lg mb-3 form-control">
                    <option value="0" disabled selected>اختر قسم</option>
                    @foreach ($departements as $departements)
                    <option value="{{$departements->id_departement}}" {{ $agent->bureau->service->departement->id_departement == $departements->id_departement ? 'selected' : '' }} >{{$departements->nom_departement_ar}}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-6 mt-3">
                <label for="nom_service_ar">المصلحة</label>
                <select id="services" class="custom-select custom-select-lg mb-3 form-control">
                    @foreach ($services as $services)
                    <option value="{{$services->id_service}}" {{ $agent->bureau->service->id_service == $services->id_service ? 'selected' : '' }} >{{$services->nom_service_ar}}</option>
                    @endforeach
                </select>
              </div>

              <div class="col-6 mt-3">
                <label for="id_bureau">المكتب</label>
                <select id="id_bureau" value="{{$agent->id_bureau}}" name="id_bureau" class="custom-select custom-select-lg mb-3 form-control">
                    @foreach ($bureaux as $bureaux)
                    <option value="{{$bureaux->id_bureau}}" {{ $agent->bureau->id_bureau == $bureaux->id_bureau ? 'selected' : '' }} >{{$bureaux->nom_bureau_ar}}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-6 mt-3">
                <label for="date_rec">تاريخ الترسيم</label>
                <input value="{{ \Carbon\Carbon::parse($agent->date_rec)->format('Y-m-d') }}" name="date_rec" type="date" class="form-control" id="date_rec" placeholder="">
              </div>

              <div class="col-8 mt-3">
                <label for="rib">رقم الحساب البنكي </label>
                <input value="{{$agent->rib}}" name="rib" type="text" class="form-control" id="rib" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="agence">Agence</label>
                <input value="{{$agent->agence}}" name="agence" type="text" class="form-control" id="agence" placeholder="">
              </div>

              <div class="col-4 mt-3">
                <label for="n_affilation" >رقم التعاضدية  </label>
                <input value="{{$agent->n_affilation}}" name="n_affilation" type="text" class="form-control" id="n_affilation" placeholder="">
              </div>
              <div class="col-4 mt-3">
                <label for="aff_mutuelle">نوع الإنخراط</label>
                <select value="{{$agent->aff_mutuelle}}" name="aff_mutuelle" class="custom-select custom-select-lg mb-3 form-control">
                  <option value="GENERAL" class="text-uppercase" {{ $agent->aff_mutuelle == 'GENERAL' ? 'selected' : '' }}>Géneral</option>
                  <option value="OMFAM" class="text-uppercase" {{ $agent->aff_mutuelle == 'OMFAM' ? 'selected' : '' }}>omfam</option>
                </select>
              </div>
              <div class="col-4 mt-3">
                <label for="aff_cmr" >CMR رقم الإنخراط </label>
                <input value="{{$agent->aff_cmr}}" name="aff_cmr" type="text" class="form-control" id="aff_cmr" placeholder="">
              </div>

          </div>
        </div>
      </div>

      <h5 class="card-title fw-semibold mt-4">معلومات أخرى (الإلحاق , رهن الإشارة , الإدماج) </h5>
            <div class="card mb-0">
              <div class="card-body">
                <div class="row">
                  <div class="col-4 mt-3">
                    <label for="id_position">نوع الإحالة</label>
                    <select name="id_position" class="custom-select custom-select-lg mb-3 form-control">
                        @foreach ($positions as $positions)
                        <option value="{{$positions->id_position}}" {{ $agent->id_position == $positions->id_position ? 'selected' : '' }}>{{$positions->nom_position_ar}}</option>
                        @endforeach

                    </select>
                  </div>
                  <div class="col-4 mt-3">
                      <label for="date_position" >تاريخ الإحالة</label>
                      <input name="date_position" type="date" value="{{ $agent->date_position!=null ? \Carbon\Carbon::parse($agent->date_position)->format('Y-m-d') : '' }}"  class="form-control" id="date_position" placeholder="">
                    </div>
                    <div class="col-4 mt-3">
                      <label for="lieu_position">مكان الإحالة</label>
                      <input name="lieu_position" type="text" value="{{$agent->lieu_position}}" class="form-control" id="lieu_position" placeholder="">
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
