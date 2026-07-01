@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h4 class="mb-0">
            Master units
        </h4>

        <a href="{{ route('units.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>

            Tambah units

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead>

                <tr>

                    <th width="80">No</th>

                    <th>Unit Code</th>

                    <th>Unit Name</th>

                    <th width="120">Status</th>

                    <th width="170">Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($units as $index => $units)

                <tr>

                    <td>

                        {{ $index + 1 }}

                    </td>

                    <td>

                        {{ $units->unit_code }}

                    </td>

                    <td>

                        {{ $units->unit_name }}

                    </td>

                    <td>

                        @if($units->is_active)

                            <span class="badge bg-success">

                                ACTIVE

                            </span>

                        @else

                            <span class="badge bg-danger">

                                NON ACTIVE

                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('units.edit',$units->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                            Edit

                        </a>

                        <form
                            action="{{ route('units.destroy',$units->id) }}"
                            method="POST"
                            style="display:inline">

                            @csrf

                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus data?')">

                                <i class="fas fa-trash"></i>

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="text-center">

                        Tidak ada data.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection