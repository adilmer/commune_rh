@extends('templates.site')
@section('content')
    <div class="container-fluid">
        @php

    use Carbon\Carbon;
    $date_naiss = $agent->date_naiss->format('Y-m-d');

    $date_naissance = Carbon::createFromFormat('Y-m-d', $date_naiss);


    $age = $date_naissance->diffInYears(Carbon::now());


    if ($date_naissance->year == 1957) {
        $dateRetrait = $date_naissance->copy()->addYears(60)->addMonths(6)->lastOfMonth();
    } elseif ($date_naissance->year >= 1958 && $date_naissance->year <= 1959) {
        $dateRetrait = $date_naissance->copy()->addYears(61)->addMonths(6)->lastOfMonth();
    } elseif ($date_naissance->year == 1960) {
        $dateRetrait = $date_naissance->copy()->addYears(62)->lastOfMonth();
    } elseif ($date_naissance->year == 1961) {
        $dateRetrait = $date_naissance->copy()->addYears(62)->addMonths(6)->lastOfMonth();
    } elseif ($date_naissance->year >= 1962) {
        $dateRetrait = $date_naissance->copy()->addYears(63);
    }

   // dd($dateRetrait);

        @endphp

        <div class="row">
            <div class="col-lg-8 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                            <div class="mb-3 mb-sm-0">
                                <h5 class="card-title fw-semibold">معلومات الموظف</h5>
                            </div>
                            <a href="{{ route('agent.edit', $agent->id_agent) }}" class="btn btn-primary">تعديل <i
                                    class="ti ti-edit"></i></a>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-4">
                                <div class="img">
                                    @if (isset($agent->photo))
                                        <img src="{{ asset('photos_agents/' . $agent->photo) }}"  onerror="this.onerror=null; this.src='{{asset('photos_agents/user-1.jpg')}}'"  class="rounded-circle"
                                            width="140px" height="140px">
                                    @else
                                        <img src="{{ asset('assets/images/profile/user-1.jpg') }}" class="rounded-circle"
                                            width="140px" height="140px">
                                    @endif
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="d">
                                    <h4 class="fw-semibold mb-1">{{ $agent->nom_ar }}</h4>
                                    <span class="fw-normal">{{ $agent->nom_fr }}</span>
                                </div>
                                <div class="d">
                                    @php
                                    $situation_fam = "";
                                        if ($agent->situation_fam == "Célibataire" ) {
                                            $situation_fam = "عازب(ة)";
                                        }
                                        if ($agent->situation_fam =="Marié" ) {
                                            $situation_fam = "متزوج(ة)";
                                        }
                                        if ($agent->situation_fam =="Divorcé" ) {
                                            $situation_fam = "مطلق(ة)";
                                        }
                                        if ($agent->situation_fam =="Veuf" ) {
                                            $situation_fam = "أرمل(ة)";
                                        }
                                    @endphp
                                    <span class="  mb-1"> الحالة العائلية : {{ $situation_fam  }}</span>
                                </div>
                                <div class="d">
                                    <span class="  mb-1"> عدد الأبناء: {{ $agent->nbr_enfant }} </span>
                                </div>
                                <div class="d">
                                    <span class="  mb-1"> الجنس: {{ $agent->sexe=='Masculin' ? 'ذكر' : 'أنثى' }}</span>
                                </div>
                                <div class="d">
                                    <span class="  mb-1"> مكان الإزدياد: {{ $agent->lieu_naiss_ar }}</span>
                                </div>
                                <div class="d">
                                    <span class="  mb-1"> تاريخ الإزدياد: {{ $agent->date_naiss?->format('Y-m-d') ?? '' }}</span>
                                </div>
                                <div class="d">
                                    <span class="  mb-1"> العنوان: {{ $agent->adresse_ar }}</span>
                                </div>
                                <div class="d">
                                    <span class="  mb-1"> الهاتف: {{ $agent->tel }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="infoagent text-center mt-5">
                            <table class="table       text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4 table-light">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">CIN</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">PPR</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">MAT</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal"> {{ $agent->cin }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->ppr }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->mat }}</p>
                                        </td>
                                    </tr>
                                </tbody>
                                <thead class="text-dark fs-4 table-light">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">الدرجة</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">السلم</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">الرتبة</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal"> {{ $agent->grade->nom_grade_ar }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->echelle }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->echellon }}</p>
                                        </td>
                                    </tr>
                                </tbody>
                                <thead class="text-dark fs-4 table-light">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">الرقم الإستدلالي</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">تاريخ الدرجة</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">تاريخ الرتبة</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal"> {{ $agent->indice }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->date_grade?->format('Y-m-d') ?? '' }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->date_echellon?->format('Y-m-d') ?? '' }}</p>
                                        </td>
                                    </tr>
                                </tbody>
                                <thead class="text-dark fs-4 table-light">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">القسم</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">المصلحة</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">المكتب</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">
                                                {{ $agent->bureau->service->departement->nom_departement_ar ?? 'بدون' }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->bureau->service->nom_service_ar ?? 'بدون' }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->bureau->nom_bureau_ar ?? 'بدون' }}</p>
                                        </td>
                                    </tr>
                                </tbody>
                                <thead class="text-dark fs-4 table-light">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">تاريخ  التوظيف </h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">تاريخ الترسيم</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">تاريخ الإزدياد</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->date_rec?->format('Y-m-d') }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->date_tuto?->format('Y-m-d') }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->date_naiss?->format('Y-m-d') }}</p>
                                        </td>
                                    </tr>
                                </tbody>
                                <thead class="text-dark fs-4 table-light">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">رقم التعاضدية</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">نوع الانخراط</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">رقم صندوق التقاعد(CMR)</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal"> {{ $agent->n_affilation }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->aff_mutuelle }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->aff_cmr }}</p>
                                        </td>
                                    </tr>
                                </tbody>
                                <thead class="text-dark fs-4 table-light">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"> إسم البنك</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"> رقم الحساب</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">تاريخ الإحالة على التقاعد</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal"> {{ $agent->agence }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->rib }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal"> {{ $dateRetrait?->format('Y-m-d') }} </p>
                                        </td>
                                    </tr>
                                </tbody>
                                <thead class="text-dark fs-4 table-light">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"> نوع المنصب</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"> تاريخ التعيين في المنصب</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"> رقم الإنخراط RCAR</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->fonction->nom_fonction_ar }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->date_fonction }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->rcar }}</p>
                                        </td>

                                    </tr>
                                </tbody>
                                <thead class="text-dark fs-4 table-light">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"> نوع الإحالة</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"> تاريخ الإحالة</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"> مكان الإحالة</h6>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->position->nom_position_ar }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{ $agent->date_position }}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal"> {{ $agent->lieu_position }}</p>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Yearly Breakup -->
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                    <div class="mb-3 mb-sm-0">
                                        <h5 class="card-title fw-semibold">أرشيف الموظف</h5>
                                    </div>
                                    <button data-bs-toggle="modal" data-bs-target="#uploadDocumentsModal"
                                        class="btn btn-primary">رفع ملف <i class="ti ti-cloud-upload"></i></button>
                                </div>
                                <div class="row align-items-center">
                                    <table class="table text-nowrap mb-0 align-middle">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">إسم الملف</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">مشاهدة</h6>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($documents as $documents)
                                                <tr>
                                                    <td class="border-bottom-0">
                                                        <p class="mb-0 fw-normal">{{ $documents->titre }}</p>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <a target="_blank"
                                                            href="{{ asset('documents_agents/' . $documents->path) }}"
                                                            class="btn btn-danger"><i class="ti ti-file-text"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <!-- Monthly Earnings -->

                    </div>
                </div>
            </div>
        </div>


    </div>

    </div>
    </div>


    <!-- modul add file-->

    <div class="modal fade" id="uploadDocumentsModal" tabindex="-1" aria-labelledby="uploadDocumentsModal"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('agent.uploadDocuments') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">رفع الملفات</h5>
                        <input type="hidden" name="id_agent" value="{{ $agent->id_agent }}">
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="titre" class="form-label">إسم الملف</label>
                            <input type="text" name="titre" class="form-control" id="titre">
                        </div>
                        <div class="col-md-12">
                            <label for="path" class="form-label">تحديد الملف</label>
                            <input type="file" name="path" class="form-control" id="path">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-primary">رفع الملف</button>
                    </div>
                </form>
            </div>
        </div>

        </body>
    @endsection
