@extends('layouts.app')

@section('content')

<div class="card">

<div class="card-header d-flex justify-content-between">

<h4>Master Analyzer</h4>

<a href="/analyzers/create"
class="btn btn-primary">

Tambah

</a>

</div>

<div class="card-body">

<table class="table table-bordered">

<thead>

<tr>

<th>Kode</th>

<th>Nama Analyzer</th>

<th>Kategori</th>

<th>Manufacturer</th>

<th>Status</th>

<th width="170">Aksi</th>

</tr>

</thead>

<tbody>

@foreach($analyzers as $analyzer)

<tr>

<td>

{{ $analyzer->analyzer_code }}

</td>

<td>

{{ $analyzer->analyzer_name }}

</td>

<td>

{{ $analyzer->category }}

</td>

<td>

{{ $analyzer->manufacturer }}

</td>

<td>

@if($analyzer->is_active)

<span class="badge bg-success">

ACTIVE

</span>

@else

<span class="badge bg-danger">

INACTIVE

</span>

@endif

</td>   

<td width="230">

<a
href="/analyzers/{{ $analyzer->id }}/mapping"
class="btn btn-primary">

Test Mapping

</a>

<a href="/analyzers/{{ $analyzer->id }}/edit"
class="btn btn-warning btn-sm">

Edit

</a>

<form
action="/analyzers/{{ $analyzer->id }}"
method="POST"
style="display:inline">
<a href="{{ route('analyzers.mapping',$analyzer->id) }}"
   class="btn btn-info btn-sm">

    <i class="fas fa-link"></i>

    Mapping

</a>

@csrf
@method('DELETE')

<button
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus Analyzer?')">

Hapus

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

@endsection