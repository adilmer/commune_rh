@extends('templates.site')
@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row alig n-items-start">
            <h1>لائحة الوثائق</h1>
            <table class="table table-bordered border-dark">
                <tbody>
                <tr>
                  <th scope="row">إضافة مولود</th>
                  <td>
                    <ol class="list-group ">
                        <li class="list-group-item">3 عقود إزدياد</li>
                        <li class="list-group-item">3 تصريح بالشرف </li>
                        <li class="list-group-item">allocation familial</li>
                        <li class="list-group-item">secours à la naissance</li>
                    </ol>
                  </td>
                </tr>
                <tr>
                    <th scope="row">إضافة زوجة</th>
                    <td>
                        <ol class="list-group ">
                            <li class="list-group-item"> 3 نسخ من بطاقة الزوجة مصادق عليها</li>
                            <li class="list-group-item"> 3 من شهادة عدم العمل للزوجة </li>
                            <li class="list-group-item"> 3  نسخ من عقد الزواج مصادق عليها</li>
                        </ol>
                      </td>
                </tr>
                <tr>
                    <th scope="row">إزالة زوجة</th>
                    <td>
                        <ol class="list-group ">
                            <li class="list-group-item">  3 نسخ من عقد الطلاق مصادق عليها</li>
                            <li class="list-group-item"> 3 نسخ من بطاقة الزوجة مصادق عليها </li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <th scope="row">تغيير الحساب البنكي</th>
                    <td>
                        <ol class="list-group ">
                            <li class="list-group-item">شهادة رفع اليد main levée</li>
                            <li class="list-group-item">attistation rib</li>
                            <li class="list-group-item">طلب خطي الى الرئيس</li>
                        </ol>
                    </td>
                </tr>
                <tr>
                    <th scope="row">ملف التقاعد </th>
                    <td>
                        <ol class="list-group ">
                            <li class="list-group-item"> بطاقة التعاضدية</li>
                            <li class="list-group-item">عقود إزدياد الأطفال</li>
                            <li class="list-group-item">attistation rib</li>
                            <li class="list-group-item"> نسخة من البطاقة الوطنية</li>
                            <li class="list-group-item">عقد الزواج</li>
                        </ol>
                    </td>
                </tr>
              </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
