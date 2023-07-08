@extends('templates.site')
@section('content')
<div class="container-fluid pt-3">


    <div class="row">
      <div class="col-lg-12 d-flex align-items-strech">
        <div class="card w-100">
          <div class="card-body">
            <div class="upload mt-3">
              <article id="contentupload">
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <img src="{{asset('assets/images/upload.png')}}" alt="upload" width="80px" />
                  <p>إضافة ملفات للأرشيف </p>
                </a>
              </article>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="input-group ">
      <div class="container">
        <div class="row ">
          <div class="col-sm-4 ">
            <input type="text" class="form-control" id="txt_cherch" placeholder="بحث ..." aria-label="Recipient's username" aria-describedby="button-addon2">
          </div>
          <div class="col-sm-4 mb-4  ">
            <div class="row">
              <div class="col-10 pl-0">
                <select id="combo_categorie" class="form-select">
                  <option value="" selected> - تصنيف الوثيقة   ...  </option>
                  @foreach ($categories as $categories)
                  <option value="{{$categories->id_categorie}}">{{$categories->nom_categorie_ar}}</option>
                    @endforeach
                </select>
              </div>

            </div>
          </div>
          <div class="col-sm-4  ">
            <input type="date" id="txt_date" class="form-control  " placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2">
          </div>
        </div>
      </div>

      </div>


    <div class="row">
      <div class="col-lg-12 d-flex align-items-strech">
        <div class="card w-100">
          <div class="card-body">
            <table class="table table-striped text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">رقم الملف</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">إسم الملف</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">تصنيف الملف</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">التاريخ </h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">خيارات</h6>
                  </th>
                </tr>
              </thead>
              <tbody id="table_archives">
                @foreach ($archives as $archives)
                <tr>
                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$archives->id_archive}}</h6></td>
                    <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1">{{$archives->nom_archive_ar}}</h6>
                    </td>
                    <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1">{{$archives->category->nom_categorie_ar}}</h6>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal">{{$archives->date_archive->format('Y-m-d')}}</p>
                    </td>
                    <td class="border-bottom-0">
                         <a target="_blank" href="{{asset('documents_archive/'.$archives->path_archive)}}"  class="badge bg-primary rounded-3 fw-semibold"><i class="ti ti-eye"></i></a>
                          <a class="badge bg-success rounded-3 fw-semibold" data-bs-toggle="modal" data-nom_archive_ar2="{{$archives->nom_archive_ar}}" data-date_archive2="{{\Carbon\Carbon::parse($archives->date_archive)->format('Y-m-d')}}" data-id_archive2="{{$archives->id_archive}}" data-id_categorie2="{{$archives->id_categorie}}" data-bs-target="#editArchive"><i class="ti ti-edit"></i></a>
                          <a href="{{route('archive.delete',$archives->id_archive)}}" onclick="return confirm('هل تريد إزالة هذا الملف من قاعدة البيانات ؟')" class="badge bg-danger rounded-3 fw-semibold"><i class="ti ti-trash"></i></a>
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


</div>
</div>



<!-- modul add file-->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <form action="{{route('archive.save')}}" method="post" enctype="multipart/form-data">
        @csrf
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" >رفع الملفات</h5>

  </div>
  <div class="modal-body">
    <div class="col-md-12">
      <label for="nom_archive_ar" class="form-label">إسم الملف</label>
      <input type="text" name="nom_archive_ar" class="form-control" id="nom_archive_ar">
    </div>
    <div class="col-md-12">
        <label for="nom_archive_ar" class="form-label">تاريخ الملف</label>
        <input type="date" name="date_archive" class="form-control" id="date_archive">
      </div>
    <div class="col-md-12">
      <div class="row">


          <label for="id_categorie" class="form-label mt-3">تصنيف الملف</label>
          <div class="col-10">
            @php
                $categories = App\Models\Category::all();
            @endphp
          <select id="combo_categorie1" name="id_categorie" class="form-select">
            <option selected> - تصنيف الملف   ...  </option>
                  @foreach ($categories as $category)
                  <option value="{{$category->id_categorie}}"> {{$category->nom_categorie_ar}}</option>
                    @endforeach
          </select>

          <input type="text"  placeholder="إسم التصنيف الجديد" class="form-control my-2 cat" id="nom_categorie_ar" >
        </div>

        <div class="col-2">
          <a id="btn_add_cat" class="btn btn-secondary btn_add_cat"><i class="ti ti-plus"></i></a>
          <button type="button"  class="btn btn-sm btn-primary  my-3 cat btn_submit">إضافة</button>
        </div>
      </div>


    </div>
    <div class="col-md-12 mt-3">
      <label for="path_archive" class="form-label">تحديد الملف</label>
      <input type="file" name="path_archive" class="form-control" id="path_archive">
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
    <button type="submit" class="btn btn-primary">حفط الملف</button>
  </div>
</div>
</form>
</div>
</div>

<!-- modul edit file-->

<div class="modal fade" id="editArchive" tabindex="-1" aria-labelledby="editArchiveLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('archive.update')}}" method="post" enctype="multipart/form-data">
            @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >تعديل الملفات</h5>

      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <label for="nom_archive_ar" class="form-label">إسم الملف</label>
          <input type="text" name="nom_archive_ar" class="form-control" id="nom_archive_ar2">
          <input type="hidden" name="id_archive" class="form-control" id="id_archive2">
        </div>
        <div class="col-md-12">
            <label for="nom_archive_ar" class="form-label">إسم الملف</label>
            <input type="date" name="date_archive" class="form-control" id="date_archive2">
          </div>
        <div class="col-md-12">
          <div class="row">


              <label for="id_categorie" class="form-label mt-3">تصنيف الملف</label>
              <div class="col-10">
                @php
                    $categories = App\Models\Category::all();
                @endphp
              <select id="combo_categorie2" name="id_categorie" class="form-select">
                <option value=""> - تصنيف الملف   ...  </option>
                      @foreach ($categories as $category)
                      <option value="{{$category->id_categorie}}"> {{$category->nom_categorie_ar}}</option>
                        @endforeach
              </select>
              <input type="text"  placeholder="إسم التصنيف الجديد" class="form-control my-2 cat" id="nom_categorie_ar2" >
            </div>

            <div class="col-2">
                <a id="btn_add_cat2" class="btn btn-secondary btn_add_cat"><i class="ti ti-plus"></i></a>
                <button type="button"  class="btn btn-sm btn-primary  my-3 cat btn_submit2">إضافة</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
        <button type="submit" class="btn btn-primary">تحديث معلومات الملف</button>
      </div>
    </div>
    </form>
    </div>
    </div>



{{-- <!-- modul add category-->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
<div class="modal-dialog">
    <form action="{{route('archive.saveCategorie')}}" method="post">
        @csrf
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">إضافة تصنيف جديد</h5>
  </div>
    <div class="modal-body">
      <div class="col-md-12 my-5">
        <label for="nom_categorie_ar" class="form-label">إسم التصنيف الجديد</label>
        <input type="text" name="nom_categorie_ar" class="form-control" id="nom_categorie_ar">
      </div>
    </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">إضافة</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
  </div>
</div>
</form>
</div> --}}
@endsection

@section('script')
$('#editArchive').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id_archive2 = button.data('id_archive2')
    var nom_archive_ar2 = button.data('nom_archive_ar2')
    var id_categorie2 = button.data('id_categorie2')
    var date_archive2 = button.data('date_archive2')
    var modal = $(this)

    modal.find('.modal-body #id_archive2').val(id_archive2);
    modal.find('.modal-body #nom_archive_ar2').val(nom_archive_ar2);
    modal.find('.modal-body #combo_categorie2').val(id_categorie2);
    modal.find('.modal-body #date_archive2').val(date_archive2);
})


$("#txt_cherch").on("input", function(){
    $text = this.value
    $url = "{{ route('archive.filter') }}"
    $("#table_archives").html("");
    get_table_ajax_find($text,$url,"#table_archives")

    });
    $("#txt_date").on("input", function(){
        $text = this.value
        $url = "{{ route('archive.filterByDate') }}"
        $("#table_archives").html("");
        get_table_ajax_find($text,$url,"#table_archives")

        });
        $("#combo_categorie").on("change", function(){
            $text = this.value
            $url = "{{ route('archive.filterByCategorie') }}"
            $("#table_archives").html("");
            get_table_ajax_find($text,$url,"#table_archives")

            });
        $(".cat").hide();
        $(".btn_add_cat").on("click", function(){
            $(".cat").show();
        });

        $(".btn_submit").on("click", function(){

            $id = $("#nom_categorie_ar").val();

            $url = "{{ route('archive.saveCategorie') }}"
            $("#combo_categorie1").html("");
            $(".cat").hide();
            get_ajax($id,$url,"#combo_categorie1")
        });

        $(".btn_submit2").on("click", function(){

            $id = $("#nom_categorie_ar2").val();

            $url = "{{ route('archive.saveCategorie') }}"
            $("#combo_categorie2").html("");
            $(".cat").hide();
            get_ajax($id,$url,"#combo_categorie2")
        });



@endsection
