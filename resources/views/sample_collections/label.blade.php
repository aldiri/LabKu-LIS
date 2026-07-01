<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">

<title>Label Sample</title>

<style>

body{

    font-family: Arial;

    margin:0;

    padding:10px;

}

.label{

    width:320px;

    border:1px solid #000;

    padding:10px;

}

.logo{

    text-align:center;

    font-size:18px;

    font-weight:bold;

    margin-bottom:8px;

}

table{

    width:100%;

    font-size:12px;

}

.barcode{

    margin-top:10px;

    text-align:center;

}

@media print{

button{

display:none;

}

.label{

border:none;

}

}

</style>

</head>

<body>

<button onclick="window.print()">

Cetak Label

</button>

<div class="label">

<div class="logo">

{{ \App\Models\LabSetting::first()->lab_name ?? 'LABKU' }}

</div>

<table>

<tr>

<td>Nama</td>

<td>: {{ $sample->registration->patient->nama }}</td>

</tr>

<tr>

<td>No RM</td>

<td>: {{ $sample->registration->patient->norm }}</td>

</tr>

<tr>

<td>No Reg</td>

<td>: {{ $sample->registration->no_reg }}</td>

</tr>

<tr>

<td>Sample</td>

<td>: {{ $sample->sampleType->sample_name }}</td>

</tr>

<tr>

<td>Tube</td>

<td>: {{ $sample->sampleType->tube_color }}</td>

</tr>

</table>

<div class="barcode">

{!! DNS1D::getBarcodeHTML(
    $sample->barcode,
    'C128',
    2,
    60
) !!}

<div>

<strong>

{{ $sample->barcode }}

</strong>

</div>

</div>

</div>

</body>

</html>