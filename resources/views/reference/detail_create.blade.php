@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h4 class="mb-0">

            Mapping Nilai Normal

        </h4>

        <a href="{{ route('references.detail',$reference->id) }}"
            class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Kembali

        </a>

    </div>

    <form method="POST"
          action="{{ route('references.detail.store',$reference->id) }}">

        @csrf

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

            @isset($copy)

            <div class="alert alert-info">

                <i class="fas fa-copy"></i>

                Data hasil Copy, silahkan ubah bila diperlukan.

            </div>

            @endisset

            <div class="row">

                <div class="col-md-3">

                    <label>Flag</label>

                    <select
                        name="flag"
                        class="form-control"
                        required>

                        @foreach(['NORMAL','LOW','HIGH','XLOW','XHIGH'] as $flag)

                        <option
                            value="{{ $flag }}"
                            {{ old('flag',$copy->flag ?? '')==$flag ? 'selected':'' }}>

                            {{ $flag }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-3">

                    <label>Gender</label>

                    <select
                        name="gender"
                        class="form-control"
                        required>

                        <option value="ALL"
                        {{ old('gender',$copy->gender ?? '')=='ALL'?'selected':'' }}>

                            ALL

                        </option>

                        <option value="L"
                        {{ old('gender',$copy->gender ?? '')=='L'?'selected':'' }}>

                            Laki-laki

                        </option>

                        <option value="P"
                        {{ old('gender',$copy->gender ?? '')=='P'?'selected':'' }}>

                            Perempuan

                        </option>

                    </select>

                </div>

            </div>

            <hr>

            <div class="row">

                <div class="col-md-6">

                    <div class="card">

                        <div class="card-header bg-light">

                            <strong>Begin Age</strong>

                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col">

                                    <label>Tahun</label>

                                    <input
                                        type="number"
                                        min="0"
                                        max="150"
                                        class="form-control"
                                        name="begin_year"
                                        value="{{ old('begin_year', isset($copy)?intval(substr($copy->begin_age,0,3)):0) }}">

                                </div>

                                <div class="col">

                                    <label>Bulan</label>

                                    <input
                                        type="number"
                                        min="0"
                                        max="11"
                                        class="form-control"
                                        name="begin_month"
                                        value="{{ old('begin_month', isset($copy)?intval(substr($copy->begin_age,3,2)):0) }}">

                                </div>

                                <div class="col">

                                    <label>Hari</label>

                                    <input
                                        type="number"
                                        min="0"
                                        max="31"
                                        class="form-control"
                                        name="begin_day"
                                        value="{{ old('begin_day', isset($copy)?intval(substr($copy->begin_age,5,2)):0) }}">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="card">

                        <div class="card-header bg-light">

                            <strong>End Age</strong>

                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col">

                                    <label>Tahun</label>

                                    <input
                                        type="number"
                                        min="0"
                                        max="150"
                                        class="form-control"
                                        name="end_year"
                                        value="{{ old('end_year', isset($copy)?intval(substr($copy->end_age,0,3)):150) }}">

                                </div>

                                <div class="col">

                                    <label>Bulan</label>

                                    <input
                                        type="number"
                                        min="0"
                                        max="11"
                                        class="form-control"
                                        name="end_month"
                                        value="{{ old('end_month', isset($copy)?intval(substr($copy->end_age,3,2)):0) }}">

                                </div>

                                <div class="col">

                                    <label>Hari</label>

                                    <input
                                        type="number"
                                        min="0"
                                        max="31"
                                        class="form-control"
                                        name="end_day"
                                        value="{{ old('end_day', isset($copy)?intval(substr($copy->end_age,5,2)):0) }}">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <hr>

            <div class="row">

                <div class="col-md-6">

                    <label>

                        Reference Value

                    </label>

                    <input
                        type="text"
                        class="form-control"
                        name="reference_value"
                        value="{{ old('reference_value',$copy->reference_value ?? '') }}"
                        placeholder="Contoh : 3.5 - 5.5">

                </div>

                <div class="col-md-3">

                    <label>

                        Batas Bawah

                    </label>

                    <input
                        type="text"
                        class="form-control"
                        name="lower_limit"
                        value="{{ old('lower_limit',$copy->lower_limit ?? '') }}">

                </div>

                <div class="col-md-3">

                    <label>

                        Batas Atas

                    </label>

                    <input
                        type="text"
                        class="form-control"
                        name="upper_limit"
                        value="{{ old('upper_limit',$copy->upper_limit ?? '') }}">

                </div>

            </div>

        </div>

        <div class="card-footer">

            <button
                type="submit"
                class="btn btn-primary">

                <i class="fas fa-save"></i>

                Simpan

            </button>

            <a href="{{ route('references.detail',$reference->id) }}"
               class="btn btn-secondary">

                Batal

            </a>

        </div>

    </form>

</div>

@endsection