@extends('layouts.app')

@section('content')

<h2>Data Registrasi</h2>

<a href="/registrations/create" class="btn btn-primary mb-3">
    Tambah Registrasi
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No Reg</th>
            <th>No RM</th>
            <th>Pasien</th>
            <th>Dokter</th>
            <th>Status</th>
            <th>Total Test</th>
            <th>Total Biaya</th>   
            <th>Aksi</th>
        </tr>
    </thead>

   <tbody>

@foreach($registrations as $registration)

<tr>

    <td>{{ $registration->no_reg }}</td>

    <td>{{ $registration->patient->norm }}</td>

    <td>{{ $registration->patient->nama }}</td>

    <td>{{ $registration->doctor->nama }}</td>

    <td>
        @if($registration->status == 'cito')
            <span class="badge bg-danger">
                CITO
            </span>
        @else
            <span class="badge bg-success">
                NON CITO
            </span>
        @endif
    </td>

    <td>
        {{ $registration->details->count() }}
    </td>

    <td>
        Rp {{ number_format($registration->details->sum('price'),0,',','.') }}
    </td>

    <td>

        <a href="/registrations/{{ $registration->id }}/edit"
           class="btn btn-warning btn-sm">
            Edit
        </a>

        <a href="{{ route('registrations.invoice',$registration->id) }}"
            target="_blank"
            class="btn btn-success btn-sm">

                Nota

</a>

        <form action="/registrations/{{ $registration->id }}"
              method="POST"
              style="display:inline">

            @csrf
            @method('DELETE')

            <button type="submit"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin hapus data?')">

                Hapus

            </button>

        </form>

    </td>

</tr>

@endforeach

</tbody>
</table>
</div>

@endsection