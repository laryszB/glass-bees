<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Raport Pasieki</title>
    <style>
        /* Dodaj niestandardowe style CSS dla raportu PDF */
        body {
            font-family: DejaVu Sans, serif;
        }
        .logo {
            text-align: center;
            font-size: 3.75rem;
            line-height: 1;
            font-weight: 700;
            text-transform: uppercase;
            --tw-text-opacity: 1;
            color: rgb(229, 181, 30);
            margin-bottom: 2px;
        }
        .page-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .apiary-name {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }
        .apiary-address{
            margin-bottom: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f0e68c; /* Kolor tła nagłówka */
        }
    </style>
</head>
<body>
<h1 class="logo">
    Glass<span style="color: black">Bees</span>
</h1>
<div class="page-title">Raport ze zbioru miodu</div>

<div class="apiary-name">Pasieka: <span style="text-transform: uppercase">{{ $apiary->name }}</span></div>
<div class="apiary-address">Adres: {{$apiary->city . ', '. $apiary->street_name . ' '. $apiary->street_number}}</div>
<table>
    <thead>
    <tr>
        <th>Data</th>
        <th>Waga</th>
        <th>Kg miodu/ul</th>
        <th>Objętość</th>
        <th>Cena</th>
        <th>Zysk</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($harvests as $harvest)
        <tr>
            <td>{{ date('d-m-Y', strtotime($harvest->harvest_date)) }}</td>
            <td>{{ $harvest->weight }} kg</td>
            <td>{{ $harvest->average_weight_per_beehive }} kg</td>
            <td>{{ $harvest->volume }} l</td>
            <td>{{ $harvest->price }} zł/kg</td>
            <td>{{ $harvest->profit }} zł</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
