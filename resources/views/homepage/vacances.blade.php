@extends('templates.site')
@section('content')
<div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="mb-3 mb-sm-0">
                      <h5 class="card-title fw-semibold">قائمة الأعياد الوطنية لسنة {{date('Y')}}</h5>
                    </div>
                    <div class="table">
                      <table class="table mb-0 align-middle">
                        <thead class="text-dark fs-4 table-primary">

                          <tr>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">نوع العطلة</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">تاريخها  </h6>
                          </th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">رأس السنة الميلادية</h6>
                                <span class="fw-normal">يوم واحد</span>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">01/01/{{date('Y')}}</p>
                            </td>
                          </tr>
                          <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">تقديم وثيقة الاستقلال</h6>
                            <span class="fw-normal">يوم واحد</span>
                            </td>
                            <td class="border-bottom-0">
                             <p class="mb-0 fw-normal">11/01/{{date('Y')}}</p>
                            </td>
                        </tr>
                          <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">عيد الشغل</h6>
                            <span class="fw-normal">يوم واحد</span>
                            </td>
                            <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">01/05/{{date('Y')}}</p>
                             </td>
                          </tr>

                          <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">عيد العرش</h6>
                            <span class="fw-normal">يوم واحد</span>
                            </td>
                            <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">30/07/{{date('Y')}}</p>
                            </td>
                          </tr>

                          <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">ذكرى استرجاع وادي الذهب</h6>
                            <span class="fw-normal">يوم واحد</span>
                            </td>
                            <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">14/08/{{date('Y')}}</p>
                            </td>
                          </tr>
                          <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">ذكرى ثورة الملك والشعب</h6>
                            
                                <span class="fw-normal">يوم واحد</span>
                            </td>
                            <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">20/08/{{date('Y')}}</p>
                            </td>
                          </tr>
                          <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">عيد الشباب</h6>
                            
                                <span class="fw-normal">يوم واحد</span>
                            </td>
                            <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">21/08/{{date('Y')}}</p>
                             </td>
                          </tr>
                         
                          <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">ذكرى المسيرة الخضراء</h6>
                            
                                <span class="fw-normal">يوم واحد</span>
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">06/11/{{date('Y')}}</p>
                          </td>
                          <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">عيد الاستقلال</h6>
                            
                                <span class="fw-normal">يوم واحد</span>
                            </td>
                            <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">18/11/{{date('Y')}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">رأس السنة الهجرية</h6>
                            
                                <span class="fw-normal">يوم واحد</span>
                            </td>
                            <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">18/11/{{date('Y')}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">عيد الفطر</h6>
                            
                                <span class="fw-normal">يوم واحد</span>
                            </td>
                            <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">18/11/{{date('Y')}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">عيد الأضحى</h6>
                            
                                <span class="fw-normal">يوم واحد</span>
                            </td>
                            <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">18/11/{{date('Y')}}</p>
                            </td>
                        </tr>
                        </tbody>
                      </table>
                      
                    </div>
              </div>
            </div>
          </div>
@endsection
