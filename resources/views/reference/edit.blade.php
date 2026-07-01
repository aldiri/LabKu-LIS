@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h4 class="mb-0">

            Edit Reference

        </h4>

        <a href="{{ route('references.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Kembali

        </a>

    </div>

    <form action="{{ route('references.update',$reference->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <div class="form-group">

                <label>

                    Test Parameter

                </label>

                <select
                    name="test_parameter_id"
                    class="form-control select2"
                    required>

                    <option value="">

                        -- Pilih Test Parameter --

                    </option>

                    @foreach($tests as $test)

                        <option
                            value="{{ $test->id }}"
                            {{ old('test_parameter_id',$reference->test_parameter_id)==$test->id ? 'selected':'' }}>

                            {{ $test->test_id }}

                            -

                            {{ $test->nama_test }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group mt-3">

                <label>

                    Method

                </label>

                <select
                    name="method_id"
                    class="form-control select2"
                    required>

                    <option value="">

                        -- Pilih Method --

                    </option>

                    @foreach($methods as $method)

                        <option
                            value="{{ $method->id }}"
                            {{ old('method_id',$reference->method_id)==$method->id ? 'selected':'' }}>

                            {{ $method->method_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group mt-3">

                <label>

                    Result Format

                </label>

                <input
                    type="text"
                    name="result_format"
                    class="form-control"
                    value="{{ old('result_format',$reference->result_format) }}"
                    placeholder="Contoh : nnn.nn">

                <small class="text-muted">

                    Contoh :
                    nnn,
                    nnn.n,
                    nnn.nn,
                    >nnn.nn,
                    <nnn.nn

                </small>

            </div>

            <div class="form-check mt-3">

                <input
                    type="checkbox"
                    class="form-check-input"
                    name="is_active"
                    id="is_active"
                    {{ old('is_active',$reference->is_active) ? 'checked' : '' }}>

                <label
                    class="form-check-label"
                    for="is_active">

                    Active

                </label>

            </div>

        </div>

        <div class="card-footer">

            <button
                type="submit"
                class="btn btn-primary">

                <i class="fas fa-save"></i>

                Update

            </button>

            <a href="{{ route('references.index') }}"
               class="btn btn-secondary">

                Batal

            </a>

        </div>

    </form>

</div>

@endsection

@push('scripts')

<script>

$(function(){

    $('.select2').select2({

        width:'100%'

    });

});

</script>

@endpush