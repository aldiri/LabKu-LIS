@extends('layouts.app')

@section('content')

<div class="card">

<div class="card-header">

<h4>Tambah Analyzer</h4>

</div>

<div class="card-body">

<form
action="/analyzers"
method="POST">

@csrf

<div class="mb-3">

<label>Kode Analyzer</label>

<input
type="text"
name="analyzer_code"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Nama Analyzer</label>

<input
type="text"
name="analyzer_name"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Kategori</label>

<select
name="category"
class="form-select">

<option>

Kimia Klinik

</option>

<option>

Hematologi

</option>

<option>

Imunologi

</option>

<option>

Mikrobiologi

</option>

<option>

Urinalisa

</option>

<option>

Koagulasi

</option>

<option>

Blood Gas

</option>

<option>

Elektrolit

</option>

<option>

POCT

</option>

<option>

Lainnya

</option>

</select>

</div>

<div class="mb-3">

<label>Manufacturer</label>

<input
type="text"
name="manufacturer"
class="form-control">

</div>

<div class="form-check mb-3">

<input
class="form-check-input"
type="checkbox"
name="is_active"
checked>

<label>

Aktif

</label>

</div>

<button
class="btn btn-primary">

Simpan

</button>

<a
href="/analyzers"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

@endsection