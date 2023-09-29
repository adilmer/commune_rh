@extends('templates.site')
@section('content')

<div class="container">

    <div class="row " style="justify-content: flex-end;">
      <div class="col-sm-3 pl-0 mb-2">
        <input type="text" class="form-control"  id="txt_cherch" placeholder="بحث ..." aria-label="Recipient's username" aria-describedby="button-addon2">
      </div>
      <div class="col-sm-2 ">
        <a href="/aptitudeprofessionnelle/create" class="btn btn-primary"><i class="ti ti-user-plus"></i> إضافة دورة جديدة</a>
      </div>
        <div class="row">

          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">دورات الكفاءة المهنية </h5>
                <div class="table-responsive">
                  <table class="table table-striped text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">سنة الدورة</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">تاريخ إجراء الإمتحان</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">عد المناصب </h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">آخر اجل لإستلام الملفات</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">إعدادات</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody id="table_conges">

                      <tr>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">2023</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">11/11/2023</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">46</p>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">01/11/2023</p>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <a href="/aptitudeprofessionnelle/details" class="badge bg-primary rounded-3 fw-semibold"><i class="ti ti-eye"></i></a>
                            <a href="" class="badge bg-success rounded-3 fw-semibold"><i class="ti ti-edit"></i></a>
                            <a href="" onclick='return confirm(`هل تريد حذف هذه الرخصة من قاعدة البيانات ؟`)' class="badge bg-danger rounded-3 fw-semibold"><i class="ti ti-trash"></i></a>
                          </div>
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



  </div>
@endsection
