@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between">

        <h4>Master Sample Type</h4>

        <a href="/sample-types/create"
           class="btn btn-primary">

            Tambah Sample

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th width="80">ID</th>

                    <th>Sample</th>

                    <th>Tube</th>

                    <th>Barcode</th>

                    <th>Keterangan</th>

                    <th width="160">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @foreach($samples as $sample)

            <tr>

                <td>{{ $sample->sample_id }}</td>

                <td>{{ $sample->sample_name }}</td>

                <td>{{ $sample->tube_color }}</td>

                <td>{{ $sample->barcode_code }}</td>

                <td>{{ $sample->description }}</td>

                <td>

                    <a href="/sample-types/{{ $sample->id }}/edit"
                       class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form
                        action="/sample-types/{{ $sample->id }}"
                        method="POST"
                        style="display:inline">

                        @csrf

                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus sample?')">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection