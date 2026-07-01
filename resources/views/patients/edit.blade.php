@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <h4>Edit Pasien</h4>
            </div>

            <div class="card-body">

                <form action="/patients/{{ $patient->id }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>No RM</label>
                        <input type="text"
                               name="norm"
                               class="form-control"
                               value="{{ $patient->norm }}">
                    </div>

                    <div class="mb-3">
                        <label>Nama Pasien</label>
                        <input type="text"
                               name="nama"
                               class="form-control"
                               value="{{ $patient->nama }}">
                    </div>

                    <div class="mb-3">
                        <label>Jenis Kelamin</label>

                        <select name="jenis_kelamin" class="form-select">

                            <option value="L"
                                {{ $patient->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                Laki-laki
                            </option>

                            <option value="P"
                                {{ $patient->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                Perempuan
                            </option>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Lahir</label>

                        <input type="date"
                               name="tanggal_lahir"
                               class="form-control"
                               value="{{ $patient->tanggal_lahir }}">
                    </div>

                    <div class="mb-3">
                        <label>Alamat</label>

                        <textarea name="alamat"
                                  class="form-control"
                                  rows="3">{{ $patient->alamat }}</textarea>
                    </div>

                    <button class="btn btn-primary">
                        Update
                    </button>

                    <a href="/patients"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection