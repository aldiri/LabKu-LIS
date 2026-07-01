@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between">

        <h4>Master Test Group</h4>

        <a href="/test-groups/create"
           class="btn btn-primary">

            Tambah

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>
    <th>Group Code</th>
    <th>Group Name</th>
    <th>Seq</th>
    <th>Aksi</th>
</tr>

            </thead>

            <tbody>

                @foreach($testGroups as $group)

                <tr>

    <td>{{ $group->group_code }}</td>

    <td>{{ $group->group_name }}</td>

    <td>{{ $group->seq }}</td>

    <td>

        <a href="/test-groups/{{ $group->id }}/edit"
           class="btn btn-warning btn-sm">

            Edit

        </a>

        <form action="/test-groups/{{ $group->id }}"
              method="POST"
              style="display:inline">

            @csrf
            @method('DELETE')

            <button class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin hapus?')">

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