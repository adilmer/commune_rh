@extends('templates.site')
@section('content')
<div class="row " style="justify-content: flex-end;direction: ltr">

          <div class="col-sm-10 m-3  align-items-stretch">
            <a href="{{route('situationfamiliale.index')}}" class="btn btn-primary"> Liste des enfant(e)s</a>

          </div>
            <div class="row">

              <div class="col-lg-8 m-auto d-flex align-items-stretch">
                <div class="card w-100">
                  <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Informations de l'enfant</h5>
                    <div class="table-responsive">
                      <table class="table text-nowrap mb-0 align-middle fs-4">
                        <tbody>
                            <tr>
                                <td class="border-bottom-0">
                                  <h6 class="fw-semibold mb-0"> Nom et prénom de l'agent :</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{strtoupper($enfant->conjoint->agent->nom_fr) }}</p>
                                </td>
                              </tr>
                          <tr>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0"> Nom et prénom de conjont(e) :</h6>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal"><a href="{{route('situationfamiliale.details',$enfant->id_conjoint)}}">{{strtoupper($enfant->conjoint->nom_cj) }}</a></p>
                            </td>
                          </tr>
                          <tr>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0"> Nom et prénom de l'enfant :</h6>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">{{strtoupper($enfant->nom_enfant)}}</p>
                            </td>
                          </tr>
                          <tr>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0"> Status d'enfant : </h6>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">{{$enfant->status_enfant=='' ? 'SANS' : strtoupper($enfant->status_enfant) }}</p>
                            </td>
                          </tr>
                          <tr>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0"> Date de naissance :</h6>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$enfant->date_naiss->format('d/m/Y')}}</p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                                <a href="{{route('situationfamiliale.edit_enfant',$enfant->id_enfant)}}" class="btn btn-info"> Editer</a>
                                <a href="{{route('situationfamiliale.delete_enfant',$enfant->id_enfant)}}" class="btn btn-danger"  onclick="return confirm('Voulez-vous supprimer cet enfant ?')" > Supprimer</a>
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
@endsection
