<!DOCTYPE html>
<html>
<head>
    <title>Liste Agents</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

    <style>
        .page-break {
            page-break-before: always;
        }

        @font-face {
            font-family: 'arabweb1';
            font-style: normal;
            font-weight: normal;
            src: url('{{ storage_path('fonts/arabweb1.ttf') }}') format('truetype');
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
        function generatePDF() {
            const element = document.getElementById('pdf-content');
            let filename = "لائحة الحضور الخاصة ب" + document.getElementById('nom_bureau').value + ' (' + Date.now() + ') ';
            html2pdf()
                .from(element)
                .save(filename + ".pdf")
        }

        window.onload = function() {
            generatePDF();
            setTimeout(function() {
                window.open(window.location, '_self').close();
            }, 2000);
        };
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
                    <h5>{{ $bureau->service->departement->nom_departement_ar }}</h5>
                    <h6>{{ $bureau->service->nom_service_ar }}</h6>
                    <p class="">{{ $bureau->nom_bureau_ar }}</p>
                    <div class="table ">
                        <table class="table table-bordered border-1 border-dark-light text-nowrap mb-0 align-middle float-right">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0 col-1">
                                        <h6 class="fw-semibold mb-0">MAT</h6>
                                    </th>
                                    <th class="border-bottom-0 col-1">
                                        <h6 class="fw-semibold mb-0">رقم التأجير</h6>
                                    </th>
                                    <th class="border-bottom-0 col-2">
                                        <h6 class="fw-semibold mb-0"> الإسم الكامل </h6>
                                    </th>
                                    <th class="border-bottom-0 col-2">
                                        <h6 class="fw-semibold mb-0">الدرجة</h6>
                                    </th>
                                    <th class="border-bottom-0 col-5">
                                        <h6 class="fw-semibold mb-0">التوقيع</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="table_agents">
                                @foreach ($bureau->agents as $agents)
                                    <tr style="height: 80px">
                                        <td class="border-bottom-0 col-1">
                                            <h6 class="fw-semibold mb-0">{{ $agents->mat }}</h6>
                                        </td>
                                        <td class="border-bottom-0 col-2">
                                            <p class="mb-0 fw-normal">{{ $agents->ppr }}</p>
                                        </td>
                                        <td class="border-bottom-0 col-3">
                                            <h6 class="fw-semibold mb-1">{{ $agents->nom_ar }}</h6>
                                            <span class="fw-normal">{{ $agents->nom_fr }}</span>
                                        </td>
                                        <td class="border-bottom-0 col-3">
                                            <p class="mb-0 fw-normal">{{ $agents->grade->nom_grade_ar }}</p>
                                        </td>
                                        <td class="border-bottom-0 col-5">
                                            <div class="d-flex align-items-center gap-2">
                                                <!-- Signature section -->
                                            </div>
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
                                                    <h6 class="fw-semibold mb-0">MAT</h6>
                                                </th>
                                                <th class="border-bottom-0 col-1">
                                                    <h6 class="fw-semibold mb-0">رقم التأجير</h6>
                                                </th>
                                                <th class="border-bottom-0 col-2">
                                                    <h6 class="fw-semibold mb-0"> الإسم الكامل </h6>
                                                </th>
                                                <th class="border-bottom-0 col-2">
                                                    <h6 class="fw-semibold mb-0">الدرجة</h6>
                                                </th>
                                                <th class="border-bottom-0 col-5">
                                                    <h6 class="fw-semibold mb-0">التوقيع</h6>
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
