@extends('layouts.app')

@section('content')

<div class="card">

<div class="card-header">

<h4>Edit Sample Type</h4>

</div>

<div class="card-body">

<form
action="/sample-types/{{ $sampleType->id }}"
method="POST">

@csrf

@method('PUT')

<div class="mb-3">

<label>Sample ID</label>

<input
type="text"
name="sample_id"
class="form-control"
value="{{ $sampleType->sample_id }}">

</div>

<div class="mb-3">

<label>Sample Name</label>

<input
type="text"
name="sample_name"
class="form-control"
value="{{ $sampleType->sample_name }}">

</div>

<div class="mb-3">

<label>Tube Color</label>

<input
type="text"
name="tube_color"
class="form-control"
value="{{ $sampleType->tube_color }}">

</div>

<div class="col-md-3 mb-3">

<label>Barcode Code</label>

<input
type="text"
name="barcode_code"
class="form-control"
value="{{ $sampleType->barcode_code }}"
required>

</div>

<div class="mb-3">

<label>Description</label>

<textarea
name="description"
class="form-control">{{ $sampleType->description }}</textarea>

</div>

<button class="btn btn-primary">

Update

</button>

<a
href="/sample-types"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

@endsection