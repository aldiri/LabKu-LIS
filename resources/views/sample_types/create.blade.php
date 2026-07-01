@extends('layouts.app')

@section('content')

<div class="card">

<div class="card-header">

<h4>Tambah Sample Type</h4>

</div>

<div class="card-body">

<form action="/sample-types" method="POST">

@csrf

<div class="mb-3">

<label>Sample ID</label>

<input
type="text"
name="sample_id"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Sample Name</label>

<input
type="text"
name="sample_name"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Tube Color</label>

<input
type="text"
name="tube_color"
class="form-control">

</div>

<div class="col-md-3 mb-3">

<label>Barcode Code</label>

<input
type="text"
name="barcode_code"
class="form-control"
placeholder="SK"
required>

</div>

<div class="mb-3">

<label>Description</label>

<textarea
name="description"
class="form-control"></textarea>

</div>

<button class="btn btn-primary">

Simpan

</button>

<a href="/sample-types"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

@endsection