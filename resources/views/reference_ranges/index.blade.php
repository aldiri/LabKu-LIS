@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h4 class="mb-0">

            Master Reference Range

        </h4>

        <a href="{{ route('reference-ranges.create') }}"
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

        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <div class="row mb-3">

            <div class="col-md-4">

                <input
                    type="text"
                    id="search"
                    class="form-control"
                    placeholder="Cari Test / Method">

            </div>

            <div class="col-md-8 text-end">

                <span class="badge badge-primary">

                    Total :
                    {{ $references->count() }}

                </span>

            </div>

        </div>

        <div class="table-responsive">

        <table
            class="table table-bordered table-hover"
            id="referenceTable">

            <thead class="table-light">

            <tr>

                <th width="50">No</th>

                <th>Test Parameter</th>

                <th>Method</th>

                <th>Format</th>

                <th>Gender</th>

                <th>Flag</th>

                <th>Age</th>

                <th>Reference</th>

                <th>Range</th>

                <th>Status</th>

                <th width="170">Action</th>

            </tr>

            </thead>

            <tbody>

            @forelse($references as $ref)

            @php

                $beginYear=intval(substr($ref->begin_age,0,3));
                $beginMonth=intval(substr($ref->begin_age,3,2));
                $beginDay=intval(substr($ref->begin_age,5,2));

                $endYear=intval(substr($ref->end_age,0,3));
                $endMonth=intval(substr($ref->end_age,3,2));
                $endDay=intval(substr($ref->end_age,5,2));

            @endphp

            <tr>

                <td>

                    {{ $loop->iteration }}

                </td>

                <td>

                    <strong>

                        {{ $ref->testParameter->test_id }}

                    </strong>

                    <br>

                    {{ $ref->testParameter->nama_test }}

                </td>

                <td>

                    {{ $ref->method->method_name }}

                </td>

                <td>

                    {{ $ref->result_format }}

                </td>

                <td>

                    @switch($ref->gender)

                        @case('ALL')

                        <span class="badge badge-secondary">

                            ALL

                        </span>

                        @break

                        @case('L')

                        <span class="badge badge-primary">

                            LAKI-LAKI

                        </span>

                        @break

                        @case('P')

                        <span class="badge badge-danger">

                            PEREMPUAN

                        </span>

                        @break

                    @endswitch

                </td>

                <td>

                    @switch($ref->flag)

                        @case('NORMAL')

                        <span
                        class="badge"

                        style="background:#28a745;color:white;">

                            NORMAL

                        </span>

                        @break

                        @case('HIGH')

                        <span
                        class="badge"

                        style="background:#ff66cc;color:white;">

                            HIGH

                        </span>

                        @break

                        @case('LOW')

                        <span
                        class="badge"

                        style="background:#ff66cc;color:white;">

                            LOW

                        </span>

                        @break

                        @case('XHIGH')

                        <span
                        class="badge"

                        style="background:#d50000;color:white;">

                            XHIGH

                        </span>

                        @break

                        @case('XLOW')

                        <span
                        class="badge"

                        style="background:#d50000;color:white;">

                            XLOW

                        </span>

                        @break

                    @endswitch

                </td>

                <td>

                    {{ $beginYear }} Th

                    {{ $beginMonth }} Bl

                    {{ $beginDay }} Hr

                    <br>

                    s/d

                    <br>

                    {{ $endYear }} Th

                    {{ $endMonth }} Bl

                    {{ $endDay }} Hr

                </td>

                <td>

                    {{ $ref->reference_value }}

                </td>

                <td>

                    {{ $ref->batas_awal }}

                    -

                    {{ $ref->batas_akhir }}

                </td>

                <td>

                    @if($ref->is_active)

                        <span class="badge badge-success">

                            ACTIVE

                        </span>

                    @else

                        <span class="badge badge-secondary">

                            NON ACTIVE

                        </span>

                    @endif

                </td>

                <td>

                    <a
                    href="{{ route('reference-ranges.edit',$ref->id) }}"
                    class="btn btn-warning btn-sm">

                        <i class="fas fa-edit"></i>

                    </a>

                    <form
                    action="{{ route('reference-ranges.destroy',$ref->id) }}"
                    method="POST"
                    style="display:inline;">

                        @csrf

                        @method('DELETE')

                        <button
                        class="btn btn-danger btn-sm"

                        onclick="return confirm('Hapus Reference?')">

                            <i class="fas fa-trash"></i>

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="11"
                    class="text-center">

                    Belum ada Reference Range

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

$('#search').keyup(function(){

    var value=$(this).val().toLowerCase();

    $("#referenceTable tbody tr").filter(function(){

        $(this).toggle(

            $(this).text().toLowerCase().indexOf(value)>-1

        );

    });

});

</script>

@endpush