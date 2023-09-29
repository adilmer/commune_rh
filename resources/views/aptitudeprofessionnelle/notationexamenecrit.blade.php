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
</div>
        <div class="row">

          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4"> لائحة المجتازين للإختبار الكتابي</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">الرقم الترتيبي</h6>
                          </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">PPR</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0"> الإسم الكامل </h6>
                        </th>

                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">نقطة الإمتحان الكتابي</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody id="table_agents">
                      <tr>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">1</p>
                          </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">1223213</p>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">وليد المرزوكي</h6>
                            <span class="fw-normal"></span>
                        </td>
                         <td class="border-bottom-0 ">
                                <input class="form-control" id="ex1" type="text">
                              </div>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
            </div>
            <div class="btnsimple text-start m-4 ">
                <button type="submit" class="btn btn-primary ">حفظ المعلومــات</button>
            </div>
            </div>

          </div>
        </div>


@endsection
