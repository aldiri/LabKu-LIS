@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between">

        <h4>Master Print Group</h4>

        <a href="/print-groups/create"
           class="btn btn-primary">

            Tambah

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>

            

                <tr>

                    <th width="80">Print ID</th>

                    <th>Group Name</th>

                    <th width="180">Aksi</th>   

                </tr>

            </thead>

            <tbody>

                @forelse($printGroups as $group)

                <tr>

                    <td>{{ $group->print_id }}</td>

                    <td>{{ strtoupper($group->group_name) }}</td>

                    <td>

                        <a href="/print-groups/{{ $group->id }}/edit"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="/print-groups/{{ $group->id }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data ini?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="3"
                        class="text-center">

                        Belum ada data

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection