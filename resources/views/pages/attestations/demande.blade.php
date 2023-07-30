@extends('templates.site')
@section('content')
<div class="row mt-5" style="justify-content: flex-end">


        <div class="row">

          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <form action="{{route('attestation.export_word')}}" method="any">
                    @csrf
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">طلب وثيقة</h5>
                <div class="col-8">
                    <input type="hidden" class="form-control" id="id_agent" name="id_agent" placeholder="" value="" required>
                    <div class="form-group row  my-3">
                        <label class="form-check-label  fs-5 pt-2 col-3" for="nom_agent" >المعني بالأمر :</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control col-5" list="agents_list" id="list_agents"  autocomplete="off"  placeholder="تحديد المعني بالأمر" value="" required >

                        <datalist id="agents_list" >
                            @foreach ($agents as $agents)
                            <option data-id="{{$agents->id_agent}}" value="{{$agents->nom_ar}}" >
                            @endforeach
                        </datalist>
                    </div>
                    </div>
                  <div class="form-check">
                    <input class="form-check-input fs-6" type="checkbox" value="c1" id="check1" name="attestation[]">
                    <label class="form-check-label fs-6" for="check1">
                      شهادة الأجرة
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input fs-6" type="checkbox" value="c2" id="check2"  name="attestation[]" >
                    <label class="form-check-label fs-6" for="check2">
                      شهادة بيان الإلتزام
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input fs-6" type="checkbox" value="c3" id="check3"  name="attestation[]" >
                    <label class="form-check-label fs-6" for="check3">
                      شهادة العمل
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input fs-6" type="checkbox" value="c4" id="check4"  name="attestation[]" >
                    <label class="form-check-label fs-6" for="check4">
                      أمر بتحويل لا رجعة فيه
                    </label>
                  </div>
                  <div class="row mt-5">
                    <div class="col-3">
                      <label class="form-check-label fs-6 pt-2" for="check4">
                        من أجل :
                      </label>
                    </div>
                    <div class="col-9">
                      <div class="form-check">
                      <select class="custom-select custom-select-lg mb-3 form-control" id="motif" name="motif"  aria-label=".form-select-lg example">
                        <option value="غرض إداري" selected>غرض إداري</option>
                        <option value="الحصول على قرض">الحصول على قرض</option>
                        <option value="تجديد البطاقة الوطنية">تجديد البطاقة الوطنية</option>
                      </select>
                      </div>
                    </div>
                  </div>
                </div>
                <h5 class="card-title fw-semibold mb-4">التوقيعات : </h5>
                <div class="row">
                  <div class="col-1">

                  </div>
                  <div class="col-4">
                        <select class="custom-select custom-select-lg mb-3 form-control" name="signature[]" aria-label=".form-select-lg example">
                        <option value=" " > </option>
                        <option selected value="رئيس المصلحة"> رئيس المصلحة </option>
                        <option value="رئيس القسم ">رئيس القسم  </option>
                      </select>
                  </div>
                  <div class="col-4">
                    <select class="custom-select custom-select-lg mb-3 form-control" name="signature[]" aria-label=".form-select-lg example">
                      <option value=" " > </option>
                      <option  value="رئيس المصلحة"> رئيس المصلحة </option>
                      <option selected value="رئيس القسم ">رئيس القسم  </option>
                      <option  value="مدير المصالح ">  مدير المصالح </option>
                    </select>
                  </div>
                </div>
                <div class="btnsucc m-4 text-start">
                  <button id="btn_submit" type="submit" class="btn btn-success" style="display: none"><i class="ti ti-printer"></i> طباعة الطلب </button>
                </div>
              </div>
            </form>
            </div>
          </div>
<div class="col-4  bg-light p-3">
            <div class="col-12">
              <h5 class="card-title fw-semibold  mb-4">المعلومات الشخصية :</h5>
            </div>
            <div class="col-12">
              <div class="table-responsive" id="info_agent">
                <table class="table table-striped text-nowrap mb-0 align-middle">
                  <tbody id="table_history">
                    <tr>
                      <td colspan="4" class="border-bottom-0">
                      <h5>الإسم الكامل :  <span class="text-bold" id="nom_ag"></span></h5>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" class="border-bottom-0">
                      <h5> رقم التأجير  : <span class="text-bold"></span></h5>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" class="border-bottom-0">
                      <h5> الدرجة : <span class="text-bold"></span></h5>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" class="border-bottom-0">
                      <h5> المكتب : <span class="text-bold"></span></h5>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" class="border-bottom-0">
                      <h5>  المصلحة : <span class="text-bold"></span></h5>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" class="border-bottom-0">
                      <h5>  القسم : <span class="text-bold"></span></h5>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>




        </div>
        </div>


      </div>
@endsection

@section('script')

list_agents.addEventListener('change', getIdAgent);
    function getIdAgent() {
        var input = document.getElementById("list_agents");
        var selectedOption = document.querySelector("#agents_list option[value='" + input.value + "']");

        if (selectedOption) {
          var id_agent = selectedOption.getAttribute("data-id");
          $("#id_agent").val(id_agent);
        $text = id_agent
        $url = "{{ route('attestation.find') }}"
        $("#info_agent").html("");
        get_table_ajax_find($text,$url,"#info_agent")
        $("#list_agents").attr("disabled",'');
        $("#btn_submit").show();
        }
      }

@endsection
