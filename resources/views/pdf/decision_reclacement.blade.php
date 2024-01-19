<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLE D'AVANCEMENT</title>
<style>
    h3,h5,p{

  font-family: arial, sans-serif;
    }
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
.marg{
    margin: 2px;
}
.center{
    text-align: center;
}
td, th {
  border: 1px solid #000;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

</head>
<body>

<div>
<p class="marg"><b>ROYAUME DU MAROC</b></p>
<p class="marg">MINISTERE DE L’INTERIEUR</p>
<p class="marg">REGION GUELMIM –OUED NOUN</p>
<p class="marg">PROVINCE TAN‐TAN</p>
<p class="marg"><b>COMMUNE DE TAN‐TAN</b></p>

</div>





<div class="center" style="margin-top: 100px;">
    <h3>TABLE D'AVANCEMENT D'ECHELON AU TITRE DE L'ANNÉE <span>{{$annee}}</span> ET ANNÉES ANTÉRIEURES</h3>
    <h5>Grade : <span> {{$grade}} </span></H5>
</div>

    <table class="table  ">
        <tr>
            <th  rowspan="2"><h4>CIN</h4></th>
            <th   rowspan="2"><h4>Nom et Prenom</h4></th>
            <th   colspan="4"><h4>Ancienenne Sutiation</h4></th>
            <th   rowspan="2"><h4>Cote</h4></th>
            <th   colspan="4"><h4>Ancienenne Sutiation</h4></th>
            <th   rowspan="2"><h4>Avis de la commission</h4></th>

        </tr>
        <tr>
            <th ><h5>Echelle</h5></th>
            <th ><h5>Echelon</h5></th>
            <th ><h5>Indice</h5></th>
            <th ><h5>Date d'effet echellon</h5></th>
            <th ><h5>Echelle</h5></th>
            <th ><h5>Echelon</h5></th>
            <th ><h5>Indice</h5></th>
            <th ><h5>Date d'effet echellon</h5></th>
        </tr>
        @foreach ($agent as $key=>$value)
        <tr>
            <td class="align-middle text-center">{{$agent[$key]->cin}}</td>
            <td class="align-middle text-center">{{$agent[$key]->nom_fr}}</td>
            <td class="align-middle text-center">{{$agent[$key]->echelle}}</td>
            <td class="align-middle text-center">{{$agent[$key]->echellon}}</td>
            <td class="align-middle text-center">{{$agent[$key]->indice}}</td>
            <td class="align-middle text-center">{{$agent[$key]->date_echellon->format('d/m/Y')}}</td>
            <td class="align-middle text-center">36</td>
            <td class="align-middle text-center">{{$Nagent[$key]->echelle}}</td>
            <td class="align-middle text-center">{{$Nagent[$key]->echellon}}</td>
            <td class="align-middle text-center">{{$Nagent[$key]->indice}}</td>
            <td class="align-middle text-center">{{$Nagent[$key]->date_echellon->format('d/m/Y')}}</td>
            <td class="align-middle text-center"></td>
        </tr>
        @endforeach

    </table>

    <h3 style="text-align: end; font-weight: bold;text-decoration: underline; margin-top: 50px;">Le President du Conseil Communal</h3>
</body>
</html>
