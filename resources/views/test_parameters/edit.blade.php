@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Edit Test Parameter</h4>
    </div>

    <div class="card-body">

        <form action="/test-parameters/{{ $testParameter->id }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Test ID</label>

                <input type="text"
                       name="test_id"
                       class="form-control"
                       value="{{ $testParameter->test_id }}"
                       required>
            </div>

            <div class="mb-3">
                <label>Type Test</label>

                <select name="test_type"
                        class="form-select">

                    <option value="1"
                    {{ $testParameter->test_type == 1 ? 'selected' : '' }}>
                        Single
                    </option>

                    <option value="2"
                    {{ $testParameter->test_type == 2 ? 'selected' : '' }}>
                        Multiple
                    </option>

                </select>
            </div>

            <div class="mb-3">
                <label>Nama Test</label>

                <input type="text"
                       name="nama_test"
                       class="form-control"
                       value="{{ $testParameter->nama_test }}"
                       required>
            </div>

            <div class="mb-3">
                <label>Test Group</label>

<select name="test_group_id" class="form-select">

    @foreach($groups as $group)

    <option value="{{ $group->id }}"
        {{ $testParameter->test_group_id == $group->id ? 'selected' : '' }}>

        {{ $group->group_name }}

    </option>

    @endforeach

</select>

            </div>

            <div class="mb-3">
                <label>Print Group</label>

                <select name="print_group_id"
                        class="form-select">

                    @foreach($prints as $group)

<option value="{{ $group->id }}"
{{ $testParameter->print_group_id == $group->id ? 'selected' : '' }}>

    {{ $group->group_name }}

</option>

@endforeach
                </select>

            </div>

            <div class="mb-3">

    <label>Sample Type</label>

    <select name="sample_type_id" class="form-select">

        <option value="">Pilih Sample</option>

        @foreach($samples as $sample)

        <option value="{{ $sample->id }}"
            {{ $testParameter->sample_type_id == $sample->id ? 'selected' : '' }}>

            {{ $sample->sample_name }}

        </option>

        @endforeach

    </select>

</div>

            <div class="mb-3">
                <label>Price</label>

                <input type="number"
                       name="price"
                       class="form-control"
                       value="{{ $testParameter->price }}">
            </div>

            <div class="mb-3">
                <label>Seq</label>

                <input type="text"
                            name="seq"
                            class="form-control"
                            value="{{ $testParameter->seq }}">
            </div>

            <div class="form-check">
                <input class="form-check-input"
                       type="checkbox"
                       name="head"
                       {{ $testParameter->head ? 'checked' : '' }}>

                <label class="form-check-label">
                    Head
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input"
                       type="checkbox"
                       name="bold"
                       {{ $testParameter->bold ? 'checked' : '' }}>

                <label class="form-check-label">
                    Bold
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input"
                       type="checkbox"
                       name="italic"
                       {{ $testParameter->italic ? 'checked' : '' }}>

                <label class="form-check-label">
                    Italic
                </label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input"
                       type="checkbox"
                       name="is_print"
                       {{ $testParameter->is_print ? 'checked' : '' }}>

                <label class="form-check-label">
                    Print
                </label>
            </div>

            <button type="submit"
                    class="btn btn-primary">

                Update

            </button>

            <a href="/test-parameters"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection