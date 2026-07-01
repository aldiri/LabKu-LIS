@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h4 class="mb-0">

                    Quick Add Reference Mapping

                </h4>

                <small class="text-muted">

                    {{ $reference->testParameter->test_id }}
                    -
                    {{ $reference->testParameter->nama_test }}

                </small>

            </div>

            <a href="{{ route('references.detail',$reference->id) }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                Kembali

            </a>

        </div>

    </div>

    <form method="POST"
          action="{{ route('references.detail.quickstore',$reference->id) }}">

        @csrf

        <div class="card-body">

        <div class="row">

    <div class="col-md-3">

        <label>Gender</label>

        <select
            name="gender"
            class="form-control">

            <option value="ALL">ALL</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>

        </select>

    </div>

</div>

<hr>

<div class="row">

    <div class="col-md-6">

        <h5>Begin Age</h5>

        <div class="row">

            <div class="col">

                <input
                    type="number"
                    name="begin_year"
                    class="form-control"
                    value="0">

            </div>

            <div class="col">

                <input
                    type="number"
                    name="begin_month"
                    class="form-control"
                    value="0">

            </div>

            <div class="col">

                <input
                    type="number"
                    name="begin_day"
                    class="form-control"
                    value="0">

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <h5>End Age</h5>

        <div class="row">

            <div class="col">

                <input
                    type="number"
                    name="end_year"
                    class="form-control"
                    value="150">

            </div>

            <div class="col">

                <input
                    type="number"
                    name="end_month"
                    class="form-control"
                    value="0">

            </div>

            <div class="col">

                <input
                    type="number"
                    name="end_day"
                    class="form-control"
                    value="0">

            </div>

        </div>

    </div>

</div>

<hr>

<table class="table table-bordered">

<thead class="bg-light">

<tr>

    <th width="120">

        Aktif

    </th>

    <th width="120">

        Flag

    </th>

    <th>

        Reference Value

    </th>

    <th width="170">

        Lower Limit

    </th>

    <th width="170">

        Upper Limit

    </th>

</tr>

</thead>

<tbody>

@foreach([
'NORMAL',
'LOW',
'HIGH',
'XLOW',
'XHIGH'
] as $flag)

<tr>

<td>

<input

type="checkbox"

name="{{ $flag }}_enable"

checked>

</td>

<td>

<strong>

{{ $flag }}

</strong>

</td>

<td>

<input

type="text"

name="{{ $flag }}_reference"

class="form-control">

</td>

<td>

<input

type="text"

name="{{ $flag }}_lower"

class="form-control">

</td>

<td>

<input

type="text"

name="{{ $flag }}_upper"

class="form-control">

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

<div class="card-footer text-right">

<button
type="submit"
class="btn btn-success">

<i class="fas fa-save"></i>

Simpan Semua

</button>

<a
href="{{ route('references.detail',$reference->id) }}"
class="btn btn-secondary">

Batal

</a>

</div>

</form>

</div>

@endsection