<!DOCTYPE html>
<html>
<head>
    <title>Liste Agents</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <style>
        .page-break {
            page-break-before: always;
        }
        body {
            font-family: 'arabweb1';
        }
        @font-face {
            font-family: 'arabweb1';
            font-style: normal;
            font-weight: normal;
            src: url('{{ storage_path('fonts/arabweb1.ttf') }}') format('truetype');
        }
        body {
            font-family: 'DejaVuSans', sans-serif;
        }
    </style>
    <script>
        function generatePDF() {
            const element = document.getElementById('pdf-content');

            html2pdf()
                .from(element)
                .save("agents.pdf")
                .then(() => {
                    window.close();
                });
        }

        window.onload = function() {
            generatePDF();
            window.close();
        };
    </script>
</head>
<body>
    <div id="pdf-content">
        @foreach($bureaus as $bureau)
            <div class="bureau">
                <h1>{{ $bureau->nom_bureau_fr }}</h1>
                <ul>
                    @foreach($bureau->agents as $agent)
                        <li>{{ $agent->nom_fr }}</li>
                        <li>{{ iconv(mb_detect_encoding($agent->nom_ar, mb_detect_order(), true), "UTF-8", $agent->nom_ar) }}</li>
                        <li>{{ $agent->ppr }}</li>
                        <li>{{ $agent->cin }}</li>
                        <hr>
                    @endforeach
                </ul>
            </div>
            <div class="page-break"></div>
        @endforeach
    </div>
</body>
</html>
