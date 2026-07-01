@extends('layouts.app')

@section('content')

@php

$beginYear = intval(substr($referenceRange->begin_age,0,3));
$beginMonth = intval(substr($referenceRange->begin_age,3,2));
$beginDay = intval(substr($referenceRange->begin_age,5,2));

$endYear = intval(substr($referenceRange->end_age,0,3));
$endMonth = intval(substr($referenceRange->end_age,3,2));
$endDay = intval(substr($referenceRange->end_age,5,2));

@endphp

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h4 class="mb-0">

            Edit Reference Range

        </h4>

        <a href="{{ route('reference-ranges.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Kembali

        </a>

    </div>

    <form action="{{ route('reference-ranges.update',$referenceRange->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label>Test Parameter</label>

                    <select name="test_parameter_id"
                            class="form-control select2"
                            required>

                        @foreach($tests as $test)

                        <option value="{{ $test->id }}"
                        {{ $referenceRange->test_parameter_id==$test->id?'selected':'' }}>

                            {{ $test->test_id }}

                            -

                            {{ $test->nama_test }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Method</label>

                    <select name="method_id"
                            class="form-control select2"
                            required>

                        @foreach($methods as $method)

                        <option value="{{ $method->id }}"
                        {{ $referenceRange->method_id==$method->id?'selected':'' }}>

                            {{ $method->method_name }}

                        </option>

                        @endforeach

                    </select>

                </div>

            </div>

            <div class="row">

                <div class="col-md-3">

                    <label>Result Format</label>

                    <input type="text"
                           name="result_format"
                           class="form-control"
                           value="{{ $referenceRange->result_format }}">

                </div>

                <div class="col-md-3">

                    <label>Gender</label>

                    <select name="gender"
                            class="form-control">

                        <option value="ALL"
                        {{ $referenceRange->gender=='ALL'?'selected':'' }}>

                            ALL

                        </option>

                        <option value="L"
                        {{ $referenceRange->gender=='L'?'selected':'' }}>

                            Laki-laki

                        </option>

                        <option value="P"
                        {{ $referenceRange->gender=='P'?'selected':'' }}>

                            Perempuan

                        </option>

                    </select>

                </div>

                <div class="col-md-3">

                    <label>Flag</label>

                    <select name="flag"
                            class="form-control">

                        <option value="NORMAL"
                        {{ $referenceRange->flag=='NORMAL'?'selected':'' }}>

                            NORMAL

                        </option>

                        <option value="HIGH"
                        {{ $referenceRange->flag=='HIGH'?'selected':'' }}>

                            HIGH

                        </option>

                        <option value="LOW"
                        {{ $referenceRange->flag=='LOW'?'selected':'' }}>

                            LOW

                        </option>

                        <option value="XHIGH"
                        {{ $referenceRange->flag=='XHIGH'?'selected':'' }}>

                            XHIGH

                        </option>

                        <option value="XLOW"
                        {{ $referenceRange->flag=='XLOW'?'selected':'' }}>

                            XLOW

                        </option>

                    </select>

                </div>

                <div class="col-md-3">

                    <label>Status</label>

                    <div class="form-check mt-2">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="is_active"
                            {{ $referenceRange->is_active ? 'checked':'' }}>

                        <label class="form-check-label">

                            Active

                        </label>

                    </div>

                </div>

            </div>

            <hr>

                        <div class="row">

                <div class="col-md-6">

                    <h5>Begin Age</h5>

                    <div class="row">

                        <div class="col">

                            <label>Tahun</label>

                            <input
                                type="number"
                                name="begin_year"
                                class="form-control"
                                value="{{ $beginYear }}">

                        </div>

                        <div class="col">

                            <label>Bulan</label>

                            <input
                                type="number"
                                name="begin_month"
                                class="form-control"
                                value="{{ $beginMonth }}">

                        </div>

                        <div class="col">

                            <label>Hari</label>

                            <input
                                type="number"
                                name="begin_day"
                                class="form-control"
                                value="{{ $beginDay }}">

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <h5>End Age</h5>

                    <div class="row">

                        <div class="col">

                            <label>Tahun</label>

                            <input
                                type="number"
                                name="end_year"
                                class="form-control"
                                value="{{ $endYear }}">

                        </div>

                        <div class="col">

                            <label>Bulan</label>

                            <input
                                type="number"
                                name="end_month"
                                class="form-control"
                                value="{{ $endMonth }}">

                        </div>

                        <div class="col">

                            <label>Hari</label>

                            <input
                                type="number"
                                name="end_day"
                                class="form-control"
                                value="{{ $endDay }}">

                        </div>

                    </div>

                </div>

            </div>

            <hr>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label>

                        Reference Value

                    </label>

                    <input
                        type="text"
                        name="reference_value"
                        class="form-control"
                        value="{{ $referenceRange->reference_value }}"
                        placeholder="70 - 110">

                    <small class="text-muted">

                        Contoh :

                        70 - 110

                        &lt;5

                        &gt;100

                        Negative

                        Positive

                    </small>

                </div>

                <div class="col-md-3 mb-3">

                    <label>

                        Batas Awal

                    </label>

                    <input
                        type="number"
                        step="0.0001"
                        name="batas_awal"
                        class="form-control"
                        value="{{ $referenceRange->batas_awal }}">

                </div>

                <div class="col-md-3 mb-3">

                    <label>

                        Batas Akhir

                    </label>

                    <input
                        type="number"
                        step="0.0001"
                        name="batas_akhir"
                        class="form-control"
                        value="{{ $referenceRange->batas_akhir }}">

                </div>

            </div>

        </div>

        <div class="card-footer text-end">

            <button
                type="submit"
                class="btn btn-primary">

                <i class="fas fa-save"></i>

                Update

            </button>

            <a href="{{ route('reference-ranges.index') }}"
               class="btn btn-secondary">

                Batal

            </a>

        </div>

    </form>

</div>

@endsection

@push('scripts')

<script>

$(document).ready(function(){

    $('.select2').select2({

        width:'100%',

        placeholder:'Pilih Data'

    });

});

</script>

@endpush