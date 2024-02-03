@extends('templates.site')
@section('content')
<div class="card">
    <form action="{{route('formation.update')}}" method="post">
        @csrf
          <div class="card-body">
            
            <h5 class="card-title fw-semibold mb-4">تعديل التكوين</h5>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-6 ">
                    <label for="nom_formation_ar" >موضوع التكوين  </label>
                    <input type="text" class="form-control" id="nom_formation_ar" value="{{$formation->nom_formation_ar}}" name="nom_formation_ar" placeholder="">
                    <input type="hidden" class="form-control" id="id_formation" value="{{$formation->id_formation}}" name="id_formation" placeholder="">
                  </div>
                  <div class="col-6 ">
                    <label for="date_formation">تاريخ التكوين</label>
                    <input name="date_formation" type="date" class="form-control" value="{{$formation->date_formation->format('Y-m-d')}}" id="date_formation" placeholder="">
                  </div>
                  <div class="col-12 mt-4">
                    <label for="participantes">المستفيدين من التكوين</label>
                    <input class="form-control" style="width: 400px" autocomplete="off" list="agents_list" id="list_agents"  placeholder="بحث...">

                    <datalist id="agents_list">
                        @foreach ($agents as $agents)
                        <option data-id="{{$agents->id_agent}}" value="{{$agents->nom_ar}}" >
                        @endforeach
                    </datalist>
                    <textarea class="form-control" id="participantes" name="participantes" rows="4">{{$formation->participantes}}</textarea>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="btnsimple text-start m-4 ">
            <button type="submit" class="btn btn-primary ">تعديل المعلومــات</button>
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
