@extends('templates.site')
@section('content')

<div class="inputsearch row" style="justify-content: flex-end;">

    <div class="col-sm-10 pl-0 mb-2  ">
      <input type="text" class="form-control " id="txt_cherch" placeholder="بحث ..." aria-label="Recipient's username" aria-describedby="button-addon2">
    </div>
    <div class="col-sm-2 ">
      <a href="{{route('member.create')}}" class="btn btn-primary"><i class="ti ti-user-plus"></i> إضافة عضو</a>

    </div>

        <div class="row" >
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">

              <div class="card-body p-4">
                <h5 class="card-title  fw-semibold mb-4">لائحة الأعضاء</h5>
                </div>

                <div class="table ">
                  <table class="table  mb-0 align-middle">
                    <thead class="text-dark fs-4 ">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0"></h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">CIN</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">الإسم الكامل</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">الدرجة</h6>
                        </th>

                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">إعدادات</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody id="table_member">

 {{-- liste agents --}}
 @foreach ($members as $members)
 <tr>
   <td class="border-bottom-0">
     <div class="img" >
         @if (isset($members->photo))
         <img class="rounded-circle " width="50px" height="50px" onerror="this.onerror=null; this.src='{{asset('photos_agents/user-1.jpg')}}'" src="{{asset('photos_agents/'.$agents->photo)}}" alt="" srcset="">
         @else
         <img class="rounded-circle" width="50px" height="50px" src="../assets/images/profile/user-1.jpg" alt="" srcset="">
         @endif
     </div>
   </td>
   <td class="border-bottom-0">
     <p class="mb-0 fw-normal">{{$members->cin}}</p>
   </td>
   <td class="border-bottom-0">
       <h6 class="fw-semibold mb-1">{{$members->nomar_member}}</h6>
       <span class="fw-normal">{{$members->nomfr_member}}</span>
   </td>
   <td class="border-bottom-0">
     <p class="mb-0 fw-normal">{{$members->grademember->nomar_grade ?? 'بدون'}}</p>

   </td>
   <td class="border-bottom-0">
     <div class="d-flex  align-items-center gap-2">
       <a href="{{route('member.details',$members->id_member)}}" class="badge bg-primary rounded-3 fw-semibold"><i class="ti ti-eye"></i></a>
       <a href="{{route('member.edit',$members->id_member)}}" class="badge bg-success rounded-3 fw-semibold"><i class="ti ti-edit"></i></a>
       <a href="{{route('member.delete',$members->id_member)}}" onclick="return confirm('هل تريد إزالة هذا الموظف من قاعدة البيانات ؟')" class="badge bg-danger rounded-3 fw-semibold"><i class="ti ti-trash"></i></a>
     </div>
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

