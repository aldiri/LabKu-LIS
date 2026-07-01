@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card">

<div class="card-header">

<h4>

Tambah Unit

</h4>

</div>

<div class="card-body">

<form action="{{ route('units.store') }}"
      method="POST">

@csrf

<div class="mb-3">

<label>

Unit Code

</label>

<input
type="text"
name="unit_code"
class="form-control"
required>

</div>

<div class="mb-3">

<label>

Unit Name

</label>

<input
type="text"
name="unit_name"
class="form-control"
required>

</div>

<div class="form-check mb-3">

<input
type="checkbox"
name="is_active"
class="form-check-input"
checked>

<label class="form-check-label">

Active

</label>

</div>

<button
class="btn btn-primary">

<i class="fas fa-save"></i>

Simpan

</button>

<a href="{{ route('units.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</div>

@endsection