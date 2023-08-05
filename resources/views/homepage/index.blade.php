@extends('templates.site')
@section('content')
<div class="row">
    <div class="col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="row alig n-items-start">
            <div class="col-10">
              <h5 class="card-title mb-9 fw-semibold"> الموظفين الملحقين </h5>
                 <h4 class="fw-semibold mb-3">{{ $detachement }}</h4>
            </div>
            <div class="col-2">
              <div class="d-flex justify-content-end">
                <div
                  class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                  <i class="ti ti-users fs-6"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="row alig n-items-start">
            <div class="col-10">
              <h5 class="card-title mb-9 fw-semibold"> الموظفين رهن إشارة </h5>
              <h4 class="fw-semibold mb-3">{{$misedisposition }}</h4>
            </div>
            <div class="col-2">
              <div class="d-flex justify-content-end">
                <div
                  class="text-white bg-warning rounded-circle p-6 d-flex align-items-center justify-content-center">
                  <i class="ti ti-users fs-6"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="row alig n-items-start">
            <div class="col-10">
              <h5 class="card-title mb-9 fw-semibold"> الموظفين المدمجين </h5>
              <h4 class="fw-semibold mb-3">{{$integration}}</h4>
            </div>
            <div class="col-2">
              <div class="d-flex justify-content-end">
                <div
                  class="text-white bg-success rounded-circle p-6 d-flex align-items-center justify-content-center">
                  <i class="ti ti-users fs-6"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="row alig n-items-start">
            <div class="col-10">
              <h5 class="card-title mb-9 fw-semibold"> الموظفين المتقاعدين </h5>
              <h4 class="fw-semibold mb-3">{{$retraites}}</h4>
            </div>
            <div class="col-2">
              <div class="d-flex justify-content-end">
                <div
                  class="text-white bg-danger rounded-circle p-6 d-flex align-items-center justify-content-center">
                  <i class="ti ti-users fs-6"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


        <!--  Row 1 -->
        <div class="row ">
          <div class="col-lg-5 d-flex align-items-strech ">
            <div class="card w-100 align-items-center">
              <div class="card-body">
                <div class="wrapper">
                  <header>
                      <p class="current-date"></p>
                      <div class="icons">
                      </div>
                  </header>
                  <div class="calendar">
                      <ul class="weeks">
                          <li>Sun</li>
                          <li>Mon</li>
                          <li>Tue</li>
                          <li>Wed</li>
                          <li>Thu</li>
                          <li>Fri</li>
                          <li>Sat</li>
                      </ul>
                      <ul class="days"></ul>
                  </div>
              </div>

              </div>
            </div>
          </div>


          <div class="col-lg-3">
                <div class="card">
                  <div class="card-body">
                    <div class="mb-3 mb-sm-0">
                      <h5 class="card-title fw-semibold">قائمة الأعياد</h5>
                    </div>
                    <div class="table-responsive">
                      <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4 table-primary">
                        </thead>
                        <tbody>
                          <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">عيد المولد النبوي</h6>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">14/02/2023</p>
                            </td>
                          </tr>
                          <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">ذكرى المسيرة الخضراء</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">14/02/2023</p>
                        </td>
                          </tr>
                          <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">عيد الاستقلال</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">14/02/2023</p>
                        </td>
                          </tr>
                          <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1"> رأس السنة الجديدة</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">14/02/2023</p>
                        </td>
                          </tr>
                          <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">تقديم وثيقة الاستقلال</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">14/02/2023</p>
                        </td>
                          </tr>
                          <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">عيد الشغل</h6>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">14/02/2023</p>
                        </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="mb-3 mb-sm-0">
                  <h5 class="card-title fw-semibold">الموظفين المحالين على التقاعد </h5>
                </div>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4 table-primary">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">إسم الموظف</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">تاريخ الإحالة</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($listretraites as $listretraites)
                      <tr>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$listretraites -> nom_ar}}</h6>
                            <span class="fw-normal">{{$listretraites -> nom_fr}}</span>
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{ date('Y/m/d', strtotime($listretraites->dateret)) }}</p>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
          </div>
        </div>
      </div>
        </div>
@endsection

@section('script')
const daysTag = document.querySelector(".days"),
currentDate = document.querySelector(".current-date"),
prevNextIcon = document.querySelectorAll(".icons span");

let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();

const months = ["يناير", "فبراير", "مارس", "ابريل", "ماي", "يونيو", "يوليوز",
"غشت", "شتنبر", "أكتوبر", "نونبر", "دجنبر"];

const renderCalendar = () => {
let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(),
lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(),
lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(),
lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();
let liTag = "";

for (let i = firstDayofMonth; i > 0; i--) {
liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
}

for (let i = 1; i <= lastDateofMonth; i++) { let isToday=i===date.getDate() && currMonth===new Date().getMonth() && currYear===new Date().getFullYear() ? "active" : "" ; liTag +=`<li class="${isToday}">${i}</li>`;
    }

    for (let i = lastDayofMonth; i < 6; i++) { liTag +=`<li class="inactive">${i - lastDayofMonth + 1}</li>`
        }
        currentDate.innerText = `${months[currMonth]} ${currYear}`;
        daysTag.innerHTML = liTag;
        }
        renderCalendar();

        prevNextIcon.forEach(icon => {
        icon.addEventListener("click", () => {
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if(currMonth < 0 || currMonth> 11) {
            date = new Date(currYear, currMonth);
            currYear = date.getFullYear();
            currMonth = date.getMonth();
            } else {
            date = new Date();
            }
            renderCalendar();
            });
            });
@endsection
