@extends('templates.site')
@section('content')

        <div class="row ">

            <div class="card row">


                <form action="{{route('attestation.export_word_decisionretraite')}}" method="get">
                    @csrf
                <h5 class="card-title fw-semibold mb-4">تنقيط الموظفين</h5>
                <div class="row">
                <h5 class="card-title fw-semibold mb-4"> التنقيط الفردي لموظف</h5>

                    <input type="hidden" class="form-control" id="id_agent" name="id_agent" placeholder="" value="" required>
                    <div class="form-group row  my-3">
                        <label class="form-check-label p-2 col-1" for="nom_agent" >المعني بالأمر :</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" list="agents_list" id="list_agents"  autocomplete="off"  placeholder="تحديد المعني بالأمر" value="" required >

                        <datalist id="agents_list" >

                        </datalist>
                    </div>
                    <div class="col-sm-5   p-1 m-auto d-flex align-items-stretch" id="info_agent">

                    </div>
                    </div>
                  <div class="col-2 ">
                    <label for="nomperear" >نقطة سنة {{date('Y')}}</label>
                    <input type="text" class="form-control" id="nomperear" name="nomperear" placeholder="">
                  </div>
                  <div class="col-2 ">
                    <label for="nomperefr"> نقطة سنة {{date('Y')-1}}</label>
                    <input name="nomperefr" type="text" class="form-control" id="nomperefr" placeholder="">
                  </div>
                  <div class="col-2 ">
                    <label for="nomperear" >نقطة سنة {{date('Y')-2}}</label>
                    <input type="text" class="form-control" id="nomperear" name="nomperear" placeholder="">
                  </div>
                  <div class="col-2 ">
                    <label for="nomperear" >نقطة سنة {{date('Y')-3}}</label>
                    <input type="text" class="form-control" id="nomperear" name="nomperear" placeholder="">
                  </div>
                  <div class="col-2 ">
                    <label for="nomperear" >نقطة سنة {{date('Y')-4}}</label>
                    <input type="text" class="form-control" id="nomperear" name="nomperear" placeholder="">
                  </div>
                  <div class="col-2 ">
                    <label for="nomperear" >نقطة سنة {{date('Y')-5}}</label>
                    <input type="text" class="form-control" id="nomperear" name="nomperear" placeholder="">
                  </div>

                </div>

                <div class="btnsucc m-4 text-start">
                  <button id="btn_submit"  type="submit" class="btn btn-primary"><i class="ti ti-printer"></i> حفظ التعديلات   </button>
                  <button id="btn_submit"  type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="ti ti-printer" ></i> تحميل بطائق التنقيط  </button>
                </div>
                <h5 class="card-title fw-semibold mb-4"> التنقيط حسب المصلحة </h5>


                <div class="row">
                    <div class="col-sm-7 pl-0 mb-2">
                        <select name="id_bureau" id="id_bureau" class="custom-select custom-select-lg mb-3 form-control">

                            <option value="0" selected>اختر ...</option>

                        </select>
                      </div>
                      <div class="col-sm-2 pl-0 mb-2">
                    <input type="text" class="form-control" value="{{date('Y')}}" id="nomperear" name="nomperear" placeholder="">
                      </div>
                      <div class="col-sm-3 ">
                        <a id="print_list" target="_blank"  href="{{route('absence.generate')}}" class="btn btn-primary"><i class="ti ti-printer"></i> طباعة الكل</a>
                      </div>
                </div>




            </form>

              </div>

        </div>

<!-- modul download agent -->

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" >تحميل بطائق التنقيط </h5>

            </div>
            <div class="modal-body">
<div class="row">

    <div class="col-4 ">
        <label for="nomperear" > من سنة </label>
        <input type="text" value="{{date('Y')}}" class="form-control" id="nomperear" name="nomperear" placeholder="">
    </div>
    <div class="col-4 ">
        <label for="nomperear" > الى</label>
        <input type="text" class="form-control" value="{{date('Y')-1}}" id="nomperear" name="nomperear" placeholder="">
      </div>
</div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-primary">حفط الملف</button>
            </div>
        </div>
 </div>

</div>



@endsection


