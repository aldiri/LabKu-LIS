@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <h4>Edit Dokter</h4>
            </div>

            <div class="card-body">

                <form action="/doctors/{{ $doctor->id }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>No Dokter</label>
                        <input type="text"
                               name="kode_dokter"
                               class="form-control"
                               value="{{ $doctor->kode_dokter }}">
                    </div>

                    <div class="mb-3">
                        <label>Nama Dokter</label>
                        <input type="text"
                               name="nama"
                               class="form-control"
                               value="{{ $doctor->nama }}">
                    </div>

                    <div class="mb-3">
                        <label>Spesialis</label>
                        <input type="text"
                               name="spesialis"
                               class="form-control"
                               value="{{ $doctor->spesialis }}">
                    </div>

                    <div class="mb-3">
                        <label>No Telepon</label>
                        <input type="text"
                               name="no_telp"
                               class="form-control"
                               value="{{ $doctor->no_telp }}">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ $doctor->email }}">
                    </div>

                    <button class="btn btn-primary">
                        Update
                    </button>

                    <a href="/doctors"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection