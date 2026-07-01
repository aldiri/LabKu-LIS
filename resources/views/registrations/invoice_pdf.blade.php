<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">

<style>

body{

font-family: DejaVu Sans;

font-size:13px;

}

table{

width:100%;

border-collapse:collapse;

}

table th{

border:1px solid #000;

padding:5px;

}

table td{

border:1px solid #000;

padding:5px;

}

</style>

</head>

<body>

<h2 align="center">

INVOICE PEMERIKSAAN LAB

</h2>

<table>

<tr>

<td width="180">

No Registrasi

</td>

<td>

{{ $registration->no_reg }}

</td>

</tr>

<tr>

<td>

No RM

</td>

<td>

{{ $registration->patient->norm }}

</td>

</tr>

<tr>

<td>

Nama Pasien

</td>

<td>

{{ $registration->patient->nama }}

</td>

</tr>

<tr>

<td>

Dokter

</td>

<td>

{{ $registration->doctor->nama }}

</td>

</tr>

</table>

<br>

<table>

<thead>

<tr>

<th width="40">

No

</th>

<th>

Pemeriksaan

</th>

<th width="120">

Harga

</th>

</tr>

</thead>

<tbody>

@php

$total=0;

@endphp

@foreach($registration->details as $detail)

@php

$total+=$detail->price;

@endphp

<tr>

<td>

{{ $loop->iteration }}

</td>

<td>

{{ $detail->testParameter->nama_test }}

</td>

<td>

Rp {{ number_format($detail->price,0,',','.') }}

</td>

</tr>

@endforeach

<tr>

<th colspan="2">

TOTAL

</th>

<th>

Rp {{ number_format($total,0,',','.') }}

</th>

</tr>

</tbody>

</table>

</body>

</html>