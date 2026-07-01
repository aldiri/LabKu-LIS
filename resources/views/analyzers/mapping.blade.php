@extends('layouts.app')

@section('content')

<div class="card">

<div class="card-header">

<h4>

Analyzer Test Mapping

</h4>

</div>

<div class="card-body">

<div class="row mb-4">

<div class="col-md-6">

<label>Analyzer</label>

<input
class="form-control"
readonly
value="{{ $analyzer->analyzer_name }}">

</div>

<div class="col-md-6">

<label>Kategori</label>

<input
class="form-control"
readonly
value="{{ $analyzer->category }}">

</div>

</div>

<form
action="{{ route('analyzers.mapping.store',$analyzer->id) }}"
method="POST">

@csrf

<div class="mb-3">

<input
type="text"
id="searchTest"
class="form-control"
placeholder="Cari Test Parameter...">

</div>

<table
class="table table-bordered"
id="mappingTable">

<thead>

<tr>

<th width="80">

Pilih

</th>

<th>

Test Parameter

</th>

<th width="350">

Metode

</th>

</tr>

</thead>

<tbody>

@foreach($tests as $test)

@php

$item = $mappingData[$test->id] ?? null;

@endphp

<tr>

<td>

<input
type="checkbox"
class="form-check-input"

name="mapping[{{ $test->id }}][checked]"

{{ $item ? 'checked' : '' }}>

</td>

<td>

{{ $test->nama_test }}

</td>

<td>

<input
type="text"

name="mapping[{{ $test->id }}][method_name]"

class="form-control"

value="{{ $item->method_name ?? '' }}"

placeholder="Masukkan Metode">

</td>

</tr>

@endforeach

</tbody>

</table>

<button
class="btn btn-primary">

Simpan Mapping

</button>

<a
href="/analyzers/{{ $analyzer->id }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

<script>

document
.getElementById("searchTest")
.addEventListener("keyup",function(){

let keyword =
this.value.toLowerCase();

let rows =
document.querySelectorAll("#mappingTable tbody tr");

rows.forEach(function(row){

let text =
row.innerText.toLowerCase();

row.style.display =
text.includes(keyword)
?
""
:
"none";

});

});

</script>

@endsection