<!DOCTYPE html>
<html>
<head>
    <title>Liste Agents</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    <style>
        .page-break {
            page-break-before: always;
        }



        @media print {
            body {
                word-spacing: 3px;
                /* Adjust the value as per your preference */
            }
        }

        .img-center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            z-index: 1000;
        }
    </style>
    <script>

window.print();

window.addEventListener('afterprint', function() {
history.back();
});
</script>
</head>
<body style="direction: rtl">
    <input type="hidden" id="nom_bureau" value="{{ $nom_file }}">
    <div id="pdf-content" class="container text-center m-auto col-12">
        <div class="">
            @foreach ($bureaus as $bureau)
                @if ($bureau->agents->count() > 0)
                    <div class="m-2">
                        <table class="col-12">
                            <tr>
                                <td class="text-left col-3">المملكة المغربية<br>وزارة الداخلية <br>جهة كلميم وادنون<br>إقليم طانطان<br>جماعة طانطان</td>
                                <td class="img-center"><img class="img-fluid" width="150px" height="auto" src="{{ asset('assets/images/en_tete.png') }}"></td>
                                <td class="text-uppercase text-right col-3">Royaume du Maroc<br>Ministère de l'Intérieur<br>Région de Guelmim-Oued Noun<br>Province de Tan-Tan<br>Commune Tan-Tan</td>
                            </tr>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6 px-5">
                            <h2><b>لائحة الموظفين المستوفون لشروط إجتياز مباراة الكفاءة المهنية برسم سنة 2023 لولوج درجة تقني من الدرجة التانية إلى غاية 19 نونبر 2023 تاريخ أول إختبار</b></h2>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <br><br>
                    <div class="table ">
                        <table class="table table-bordered border-1 border-dark-light text-nowrap mb-0 align-middle float-right">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0 col-1">
                                        <h4 class="fw-semibold mb-0">ر.ت</h4>
                                    </th>
                                    <th class="border-bottom-0 col-1">
                                        <h4 class="fw-semibold mb-0">رقم التأجير</h4>
                                    </th>
                                    <th class="border-bottom-0 col-2">
                                        <h4 class="fw-semibold mb-0"> الإسم الكامل </h4>
                                    </th>
                                    <th class="border-bottom-0 col-2">
                                        <h4 class="fw-semibold mb-0">تاريخ إستيفاء الشروط</h4>
                                    </th>

                                </tr>
                            </thead>
                            <tbody id="table_agents">
                                @foreach ($bureau->agents as $agents)
                                    <tr style="height: 80px">
                                        <td class="border-bottom-0 col-1">
                                            <h4 class="fw-semibold mb-0">{{ $agents->mat }}</h4>
                                        </td>
                                        <td class="border-bottom-0 col-2">
                                            <p class="mb-0 fw-normal">{{ $agents->ppr }}</p>
                                        </td>
                                        <td class="border-bottom-0 col-3">
                                            <h4 class="fw-semibold mb-1">{{ $agents->nom_ar }}</h4>
                                            <span class="fw-normal">{{ $agents->nom_fr }}</span>
                                        </td>
                                        <td class="border-bottom-0 col-3">
                                            <h4 class="mb-0 fw-normal">{{ $agents->grade->nom_grade_ar }}</h4>
                                        </td>
                                    </tr>
                                    @if ($loop->iteration % 9 === 0)
                                        </tbody>
                                    </table>
                                    <div class="page-break"></div>
                                    <table class="table table-bordered border-1 border-dark-light text-nowrap mb-0 align-middle float-right mt-4">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th class="border-bottom-0 col-1">
                                                    <h4 class="fw-semibold mb-0">ر.ت</h4>
                                                </th>
                                                <th class="border-bottom-0 col-1">
                                                    <h4 class="fw-semibold mb-0">رقم التأجير</h4>
                                                </th>
                                                <th class="border-bottom-0 col-2">
                                                    <h4 class="fw-semibold mb-0"> الإسم الكامل</h4>
                                                </th>
                                                <th class="border-bottom-0 col-2">
                                                    <h4 class="fw-semibold mb-0">تاريخ إستيفاء الشروط</h4>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="table_agents">
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        @if ($bureau->agents->count() > $loop->iteration)
                            <div class="page-break"></div>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</body>
</html>
