@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h4 class="mb-0">

            Master Reference

        </h4>

        <a href="{{ route('references.create') }}"
            class="btn btn-primary">

            <i class="fas fa-plus"></i>

            Tambah Reference

        </a>

    </div>

    <div class="card-body">

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif
<form method="GET">

<div class="row mb-3">

    <div class="col-md-4">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Cari Test / Method..."
            value="{{ request('search') }}">

    </div>

    <div class="col-md-2">

        <button
            class="btn btn-primary">

            <i class="fas fa-search"></i>

            Cari

        </button>

    </div>

</div>

</form>
        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-light">

                    <tr>

                        <th width="60">

                            No

                        </th>

                        <th>

                            Test Parameter

                        </th>

                        <th>

                            Method

                        </th>

                        <th>

    Unit

</th>

                        <th>

                            Result Format

                        </th>

                        <th width="120">

                            Mapping

                        </th>

                        <th width="100">

                            Status

                        </th>

                        <th width="220">

                            Action

                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($references as $row)

                <tr>

                    <td>

                        {{ $loop->iteration }}

                    </td>

                    <td>

                        <strong>

                            {{ $row->testParameter->test_id }}

                        </strong>

                        <br>

                        {{ $row->testParameter->nama_test }}

                    </td>

                    <td>

                        {{ $row->method->method_name }}

                    </td>

                    <td>

    {{ $reference->unit->unit_name ?? '-' }}

</td>

                    <td>

                        {{ $row->result_format }}

                    </td>

                    <td>

                        <span class="badge badge-info">

                            {{ $row->details_count }}

                            Mapping

                        </span>

                    </td>

                    <td>

                        @if($row->is_active)

                            <span class="badge badge-success">

                                Active

                            </span>

                        @else

                            <span class="badge badge-secondary">

                                Non Active

                            </span>

                        @endif

                    </td>

                    <td>

                        <a

                            href="{{ route('references.detail',$row->id) }}"

                            class="btn btn-info btn-sm">

                            <i class="fas fa-list"></i>

                            Detail

                        </a>

                        <a

                            href="{{ route('references.edit',$row->id) }}"

                            class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                        </a>

                        <form

                            action="{{ route('references.destroy',$row->id) }}"

                            method="POST"

                            style="display:inline;">

                            @csrf

                            @method('DELETE')

                            <button

                                class="btn btn-danger btn-sm"

                                onclick="return confirm('Hapus Reference ?')">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="text-center">

                        Belum ada data.

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

            <div class="mt-3">

    {{ $references->links() }}

</div>

        </div>

    </div>

</div>

@endsection