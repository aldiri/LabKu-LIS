@extends('layouts.app')

@section('content')

<h2>Data Dokter</h2>

<a href="/doctors/create" class="btn btn-primary mb-3">
    Tambah Dokter
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Kode Dokter</th>
            <th>Nama</th>
            <th>Spesialis</th>
            <th>No Telp</th>
        </tr>
    </thead>

    <tbody>
        @foreach($doctors as $doctor)
<tr>
    <td>{{ $doctor->kode_dokter }}</td>
    <td>{{ $doctor->nama }}</td>
    <td>{{ $doctor->spesialis }}</td>
    <td>{{ $doctor->no_telp }}</td>

    <td>
    <a href="/doctors/{{ $doctor->id }}/edit"
       class="btn btn-warning btn-sm">
        Edit
    </a>

    <form action="/doctors/{{ $doctor->id }}"
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