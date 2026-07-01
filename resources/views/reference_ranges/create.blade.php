@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h4 class="mb-0">

            Tambah Reference Range

        </h4>

        <a href="{{ route('reference-ranges.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Kembali

        </a>

    </div>

    <form action="{{ route('reference-ranges.store') }}"
          method="POST">

        @csrf

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

                        <option value="">-- Pilih Test Parameter --</option>

                        @foreach($tests as $test)

                        <option value="{{ $test->id }}"
                            {{ old('test_parameter_id')==$test->id?'selected':'' }}>

                            {{ $test->test_id }} - {{ $test->nama_test }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Method</label>

                    <select name="method_id"
                            class="form-control select2"
                            required>

                        <option value="">-- Pilih Method --</option>

                        @foreach($methods as $method)

                        <option value="{{ $method->id }}"
                            {{ old('method_id')==$method->id?'selected':'' }}>

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
                           value="{{ old('result_format') }}"
                           placeholder="nnn.nn">

                    <small class="text-muted">

                        Contoh :
                        nnn,
                        nnn.n,
                        nnn.nn,
                        &gt;nnn.nn,
                        &lt;nnn.nn

                    </small>

                </div>

                <div class="col-md-3">

                    <label>Gender</label>

                    <select name="gender"
                            class="form-control">

                        <option value="ALL">ALL</option>

                        <option value="L">Laki-laki</option>

                        <option value="P">Perempuan</option>

                    </select>

                </div>

                <div class="col-md-3">

                    <label>Flag</label>

                    <select name="flag"
                            class="form-control">

                        <option value="NORMAL">NORMAL</option>

                        <option value="HIGH">HIGH</option>

                        <option value="LOW">LOW</option>

                        <option value="XHIGH">XHIGH</option>

                        <option value="XLOW">XLOW</option>

                    </select>

                </div>

                <div class="col-md-3">

                    <label>Status</label>

                    <div class="form-check mt-2">

                        <input class="form-check-input"
                               type="checkbox"
                               name="is_active"
                               checked>

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

                            <input type="number"
                                   name="begin_year"
                                   class="form-control"
                                   value="0">

                        </div>

                        <div class="col">

                            <label>Bulan</label>

                            <input type="number"
                                   name="begin_month"
                                   class="form-control"
                                   value="0">

                        </div>

                        <div class="col">

                            <label>Hari</label>

                            <input type="number"
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

                            <label>Tahun</label>

                            <input type="number"
                                   name="end_year"
                                   class="form-control"
                                   value="150">

                        </div>

                        <div class="col">

                            <label>Bulan</label>

                            <input type="number"
                                   name="end_month"
                                   class="form-control"
                                   value="0">

                        </div>

                        <div class="col">

                            <label>Hari</label>

                            <input type="number"
                                   name="end_day"
                                   class="form-control"
                                   value="0">

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

                    <input type="text"
                           name="reference_value"
                           class="form-control"
                           value="{{ old('reference_value') }}"
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

                    <input type="number"
                           step="0.0001"
                           name="batas_awal"
                           class="form-control"
                           value="{{ old('batas_awal') }}">

                </div>

                <div class="col-md-3 mb-3">

                    <label>

                        Batas Akhir

                    </label>

                    <input type="number"
                           step="0.0001"
                           name="batas_akhir"
                           class="form-control"
                           value="{{ old('batas_akhir') }}">

                </div>

            </div>

        </div>

        <div class="card-footer text-end">

            <button
                type="submit"
                class="btn btn-primary">

                <i class="fas fa-save"></i>

                Simpan

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