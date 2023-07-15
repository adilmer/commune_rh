<!DOCTYPE html>
<html>
<head>


    <title>Liste Agents</title>

    <style>
        .page-break {
            page-break-before: always;
        }
       /*  body{
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
    } */
   </style>

</head>
<body>

    @foreach($bureaus as $bureau)

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
        <div class="page-break"></div>
    @endforeach
</body>
</html>
