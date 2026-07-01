@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">

            <div class="card-header">
                <h4>Tambah Registrasi Lab</h4>
            </div>

            <div class="card-body">

                <form action="/registrations" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">No Registrasi</label>

                        <input type="text"
                               class="form-control"
                               value="Otomatis Generate"
                               readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pasien</label>

                        <select name="patient_id"
        id="patient_id"
        class="form-select"
        required>

    <option value="">
        Cari no RM / Nama Pasien
    </option>

    @foreach($patients as $patient)

    <option value="{{ $patient->id }}"
            data-norm="{{ $patient->norm }}"
            data-nama="{{ $patient->nama }}"
            data-tgl="{{ $patient->tanggal_lahir }}">

        {{ $patient->norm }} - {{ $patient->nama }}

    </option>

    @endforeach

</select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No RM</label>

                        <input type="text"
                               id="norm"
                               class="form-control"
                               readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Pasien</label>

                        <input type="text"
                               id="nama"
                               class="form-control"
                               readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>

                        <input type="date"
                               id="tanggal_lahir"
                               class="form-control"
                               readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dokter Pengirim</label>

                        <select name="doctor_id"
                                class="form-select"
                                required>

                            <option value="">
                                Pilih Dokter
                            </option>

                            @foreach($doctors as $doctor)

                            <option value="{{ $doctor->id }}">
                                {{ $doctor->nama }}
                            </option>

                            @endforeach

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Prioritas</label>

                        <select name="status"
                                class="form-select"
                                required>

                            <option value="">
                                Pilih Prioritas
                            </option>

                            <option value="non_cito">
                                Non CITO
                            </option>

                            <option value="cito">
                                CITO
                            </option>

                        </select>
                    </div>

                    <hr>

<h5>Pemeriksaan</h5>

<div class="row">

@foreach($tests as $test)

<div class="col-md-4 mb-2">

    <div class="form-check">

        <input class="form-check-input"
               type="checkbox"
               name="tests[]"
               value="{{ $test->id }}">

        <label class="form-check-label">

            {{ $test->nama_test }}

            <br>

            <small class="text-muted">
                Rp {{ number_format($test->price,0,',','.') }}
            </small>

        </label>

    </div>

</div>

@endforeach

</div>
                    <button type="submit"
                            class="btn btn-primary">

                        Simpan
                    </button>

                    <a href="/registrations"
                       class="btn btn-secondary">

                        Kembali
                    </a>

                </form>

            </div>

        </div>

    </div>
</div>

<script>
document.getElementById('patient_id')
.addEventListener('change', function () {

    let selected =
        this.options[this.selectedIndex];

    document.getElementById('norm').value =
        selected.dataset.norm || '';

    document.getElementById('nama').value =
        selected.dataset.nama || '';

    document.getElementById('tanggal_lahir').value =
        selected.dataset.tgl || '';
        

});

</script>

@endsection 