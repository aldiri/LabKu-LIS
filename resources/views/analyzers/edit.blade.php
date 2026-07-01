@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>Edit Analyzer</h4>

    </div>

    <div class="card-body">

        <form action="/analyzers/{{ $analyzer->id }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Kode Analyzer</label>

                <input
                    type="text"
                    name="analyzer_code"
                    class="form-control"
                    value="{{ $analyzer->analyzer_code }}"
                    required>

            </div>

            <div class="mb-3">

                <label>Nama Analyzer</label>

                <input
                    type="text"
                    name="analyzer_name"
                    class="form-control"
                    value="{{ $analyzer->analyzer_name }}"
                    required>

            </div>

            <div class="mb-3">

                <label>Kategori</label>

                <select
                    name="category"
                    class="form-select">

                    @php

                    $categories = [

                        'Kimia Klinik',

                        'Hematologi',

                        'Imunologi',

                        'Mikrobiologi',

                        'Urinalisa',

                        'Koagulasi',

                        'Blood Gas',

                        'Elektrolit',

                        'POCT',

                        'Lainnya'

                    ];

                    @endphp

                    @foreach($categories as $category)

                    <option
                        value="{{ $category }}"
                        {{ $analyzer->category == $category ? 'selected' : '' }}>

                        {{ $category }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Manufacturer</label>

                <input
                    type="text"
                    name="manufacturer"
                    class="form-control"
                    value="{{ $analyzer->manufacturer }}">

            </div>

            <div class="form-check mb-4">

                <input
                    class="form-check-input"
                    type="checkbox"
                    name="is_active"
                    {{ $analyzer->is_active ? 'checked' : '' }}>

                <label class="form-check-label">

                    Aktif

                </label>

            </div>

            <button
                class="btn btn-primary">

                Update

            </button>

            <a
                href="/analyzers"
                class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection