@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card">

<div class="card-header">

<h4>

Edit Method

</h4>

</div>

<div class="card-body">

<form
action="{{ route('methods.update',$method->id) }}"
method="POST">

@csrf

@method('PUT')

<div class="mb-3">

<label>

Method Code

</label>

<input
type="text"
name="method_code"
class="form-control"
value="{{ $method->method_code }}"
required>

</div>

<div class="mb-3">

<label>

Method Name

</label>

<input
type="text"
name="method_name"
class="form-control"
value="{{ $method->method_name }}"
required>

</div>

<div class="form-check mb-3">

<input
type="checkbox"
name="is_active"
class="form-check-input"
{{ $method->is_active ? 'checked' : '' }}>

<label class="form-check-label">

Active

</label>

</div>

<button
class="btn btn-primary">

<i class="fas fa-save"></i>

Update

</button>

<a href="{{ route('methods.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</div>

@endsection