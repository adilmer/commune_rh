@extends('templates.site')
@section('content')


<div class="row ">
    <div class="col-1 ">
    </div>
    <div class="col-sm-8">
      <select name="id_bureau" id="id_bureau" class="custom-select custom-select-lg mb-3 form-control">
          <option value="0" selected>إختيار الهيئة ...</option>
      </select>
    </div>
    <div class="col-sm-2  ">
        <button type="submit" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal2 ">إضافة موظف </button>
    </div>
</div>
        <div class="row">

          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4"> لائحة الموظفين المستوفون للشروط</h5>
                <div class="table-responsive">
                  <table class="table table-striped text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">MAT</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">PPR</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0"> الإسم الكامل </h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">الدرجة</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0"> الأقدمية في الدرجة</h6>
                        </th>
                         <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">تاريخ إستيفاء الشرط</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">مشاهدة</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody id="table_agents">
                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">21</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">1223213</p>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">وليد المرزوكي</h6>
                            <span class="fw-normal"></span>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">تقني من الدرجة التانية</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">11/10/2016</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">11/10/2022</p>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <a href="">
                            <span class="badge bg-danger rounded-3 fw-semibold"><i class="ti ti-trash"></i></span>
                            </a>
                          </div>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
            </div>
            <div class="btnsimple text-start m-4 ">
                <button type="submit" class="btn btn-secondary ">تحميــل اللائحـة</button>
                <button type="submit" class="btn btn-primary ">حفظ المعلومــات</button>
            </div>
            </div>

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

    <input type="hidden" class="form-control" id="id_agent" name="id_agent" placeholder="" value="" required>
    <div class="form-group row  ">
        <label class="form-check-label col-2" for="nom_agent" >المعني بالأمر :</label>
    <div class="col-sm-9">
    <input type="text" class="form-control" list="agents_list" id="list_agents"  autocomplete="off"  placeholder="تحديد المعني بالأمر" value="" required >

        <datalist id="agents_list" >

        </datalist>
    </div>
    <div class="col-sm-12   p-1 m-auto d-flex align-items-stretch" id="info_agent">

    </div>
    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-primary">إضافة الى اللائحة</button>
            </div>
        </div>
 </div>

</div>

@endsection
