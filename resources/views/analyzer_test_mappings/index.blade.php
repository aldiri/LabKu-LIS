@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <div>

            <h4 class="mb-0">

                Analyzer Test Mapping

            </h4>

            <small class="text-muted">

                {{ $analyzer->analyzer_name }}

            </small>

        </div>

        <a href="/analyzers"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Kembali

        </a>

    </div>

    <div class="card-body">

        @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

        @endif

        <div class="row mb-3">

            <div class="col-md-4">

                <input
                    type="text"
                    id="search"
                    class="form-control"
                    placeholder="Cari Test Parameter...">

            </div>

        </div>

        <form
            action="{{ route('analyzers.mapping.store',$analyzer->id) }}"
            method="POST">

            @csrf

            <table
                class="table table-bordered table-hover"
                id="mappingTable">

                <thead>

                <tr>

                    <th width="60">

                        Aktif

                    </th>

                    <th>

                        Test Parameter

                    </th>

                    <th width="250">

                        Method

                    </th>

                    <th width="180">

                        Unit

                    </th>

                </tr>

                </thead>

                <tbody>

                @foreach($tests as $test)

                @php

                    $map = $mappings[$test->id] ?? null;

                @endphp

                <tr>

                    <td class="text-center">

                        <input
                            type="checkbox"

                            name="mapping[{{ $test->id }}][active]"

                            {{ $map ? 'checked' : '' }}>

                    </td>

                    <td>

                        <strong>

                            {{ $test->test_id }}

                        </strong>

                        <br>

                        {{ $test->nama_test }}

                    </td>

                    <td>

                        <select
                            class="form-select"

                            name="mapping[{{ $test->id }}][method_id]">

                            <option value="">

                                -- Pilih Method --

                            </option>

                            @foreach($methods as $method)

                            <option
                                value="{{ $method->id }}"

                                {{ $map && $map->method_id==$method->id ? 'selected' : '' }}>

                                {{ $method->method_name }}

                            </option>

                            @endforeach

                        </select>

                    </td>

                    <td>

                        <select
                            class="form-select"

                            name="mapping[{{ $test->id }}][unit_id]">

                            <option value="">

                                -- Pilih Unit --

                            </option>

                            @foreach($units as $unit)

                            <option
                                value="{{ $unit->id }}"

                                {{ $map && $map->unit_id==$unit->id ? 'selected' : '' }}>

                                {{ $unit->unit_name }}

                            </option>

                            @endforeach

                        </select>

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

            <button
                class="btn btn-primary">

                <i class="fas fa-save"></i>

                Simpan Mapping

            </button>

        </form>

    </div>

</div>

@endsection

@push('scripts')

<script>

document.getElementById("search")
.addEventListener("keyup",function(){

    let value =
        this.value.toLowerCase();

    let rows =
        document.querySelectorAll("#mappingTable tbody tr");

    rows.forEach(function(row){

        let text =
            row.innerText.toLowerCase();

        row.style.display =
            text.includes(value)
            ?
            ""
            :
            "none";

    });

});

</script>

@endpush