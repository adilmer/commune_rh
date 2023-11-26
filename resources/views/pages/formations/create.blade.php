@extends('templates.site')
@section('content')
<div class="card">
    <form action="{{route('formation.save')}}" enctype="multipart/form-data" method="post">
        @csrf
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">تكوين جديد </h5>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-6 ">
                    <label for="nom_formation_ar" >موضوع التكوين  </label>
                    <input type="text" class="form-control" id="nom_formation_ar" name="nom_formation_ar" placeholder="">
                  </div>
                  <div class="col-6 ">
                    <label for="date_formation">تاريخ التكوين</label>
                    <input name="date_formation" type="date" class="form-control" id="date_formation" placeholder="">
                  </div>
                  <div class="col-12 mt-4">
                    <label for="participantes">المستفيدين من التكوين</label>
                        <input class="form-control" style="width: 400px" list="agents_list" id="list_agents" autocomplete="off"  placeholder="بحث...">

                    <datalist id="agents_list">
                        @foreach ($agents as $agents)
                        <option data-id="{{$agents->id_agent}}" value="{{$agents->nom_ar}}" >
                        @endforeach
                    </datalist>
                    <textarea class="form-control"id="participantes" name="participantes"  rows="4"></textarea>
                  </div>
                  <div class="col-12 mt-4">
                    <label for="path_formation" >رسالة التكوين </label>
                    <input name="path_formation" type="file" class="form-control" id="path_formation" placeholder="">
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="btnsimple text-start m-4 ">
            <button type="submit" class="btn btn-primary ">حفط المعلومــات</button>
          </div>
        </form>
        </div>
@endsection
@section('script')
list_agents.addEventListener('change', getIdAgent);
    function getIdAgent() {
        var input = document.getElementById("list_agents");
        var selectedOption = document.querySelector("#agents_list option[value='" + input.value + "']");

        if (selectedOption) {

            $("#participantes").text($("#participantes").text()+" - "+$("#list_agents").val())
            if($("#participantes").text().indexOf(" - ")==0)
            $("#participantes").text($("#participantes").text().substring(3,100))

            $("#list_agents").val("")


        }
      }

@endsection
