@extends('layouts.app')

@section('content')

<h2>Data Pasien</h2>

<a href="/patients/create" class="btn btn-primary mb-3">
    Tambah Pasien
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No RM</th>
            <th>Nama</th>
            <th>JK</th>
            <th>Tgl Lahir</th>
            <th>Alamat</th>
        </tr>
    </thead>

    <tbody>
        @foreach($patients as $patient)
<tr>
    <td>{{ $patient->norm }}</td>
    <td>{{ $patient->nama }}</td>
    <td>{{ $patient->jenis_kelamin }}</td>
    <td>{{ $patient->tanggal_lahir }}</td>
    <td>{{ $patient->alamat }}</td>

    <td>
    <a href="/patients/{{ $patient->id }}/edit"
       class="btn btn-warning btn-sm">
        Edit
    </a>

    <form action="/patients/{{ $patient->id }}"
          method="POST"
          style="display:inline">

        @csrf
        @method('DELETE')

        <button class="btn btn-danger btn-sm"
                onclick="return confirm('Yakin hapus data?')">
            Hapus
        </button>

    </form>
</td>
</tr>
@endforeach
    </tbody>
</table>

@endsection