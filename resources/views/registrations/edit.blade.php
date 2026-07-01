@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card">

            <div class="card-header">
                <h4>Edit Registrasi Lab</h4>
            </div>

            <div class="card-body">

                <form action="/registrations/{{ $registration->id }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label>No Registrasi</label>

                        <input type="text"
                               class="form-control"
                               value="{{ $registration->no_reg }}"
                               readonly>

                    </div>

                    <div class="mb-3">

                        <label>Pasien</label>

                        <select name="patient_id"
                                id="patient_id"
                                class="form-select">

                            @foreach($patients as $patient)

                            <option value="{{ $patient->id }}"
                                data-norm="{{ $patient->norm }}"
                                data-nama="{{ $patient->nama }}"
                                data-tgl="{{ $patient->tanggal_lahir }}"
                                {{ $registration->patient_id == $patient->id ? 'selected' : '' }}>

                                {{ $patient->norm }} - {{ $patient->nama }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label>No RM</label>

                        <input type="text"
                               id="norm"
                               class="form-control"
                               readonly>

                    </div>

                    <div class="mb-3">

                        <label>Nama Pasien</label>

                        <input type="text"
                               id="nama"
                               class="form-control"
                               readonly>

                    </div>

                    <div class="mb-3">

                        <label>Tanggal Lahir</label>

                        <input type="date"
                               id="tanggal_lahir"
                               class="form-control"
                               readonly>

                    </div>

                    <div class="mb-3">

                        <label>Dokter Pengirim</label>

                        <select name="doctor_id"
                                class="form-select">

                            @foreach($doctors as $doctor)

                            <option value="{{ $doctor->id }}"
                                {{ $registration->doctor_id == $doctor->id ? 'selected' : '' }}>

                                {{ $doctor->nama }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label>Prioritas</label>

                        <select name="status"
                                class="form-select">

                            <option value="non_cito"
                            {{ $registration->status == 'non_cito' ? 'selected' : '' }}>
                                NON CITO
                            </option>

                            <option value="cito"
                            {{ $registration->status == 'cito' ? 'selected' : '' }}>
                                CITO
                            </option>

                        </select>

                        <hr>

<h5>Pemeriksaan</h5>

<div class="row">

@foreach($tests as $test)

<div class="col-md-4 mb-2">

    <div class="form-check">

        <input
            class="form-check-input"
            type="checkbox"
            name="tests[]"
            value="{{ $test->id }}"

            @if(
                $registration->details
                    ->where(
                        'test_parameter_id',
                        $test->id
                    )
                    ->count()
            )
                checked
            @endif
        >

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

                    </div>

                    <button type="submit"
                            class="btn btn-primary">

                        Update

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

function loadPatientData()
{
    let selected =
        document.getElementById('patient_id')
        .options[
            document.getElementById('patient_id').selectedIndex
        ];

    document.getElementById('norm').value =
        selected.dataset.norm || '';

    document.getElementById('nama').value =
        selected.dataset.nama || '';

    document.getElementById('tanggal_lahir').value =
        selected.dataset.tgl || '';
}

document.getElementById('patient_id')
.addEventListener('change', loadPatientData);

loadPatientData();

</script>

@endsection