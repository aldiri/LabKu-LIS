@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-10">

        <div class="card">

            <div class="card-header">
                <h4>Tambah Test Parameter</h4>
            </div>

            <div class="card-body">

                <form action="/test-parameters" method="POST">

                    @csrf

                    <div class="row">

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Test ID
                            </label>

                            <input type="text"
                                   name="test_id"
                                   class="form-control"
                                   placeholder="K000001"
                                   required>

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Type Test
                            </label>

                            <select name="test_type"
                                    class="form-select">

                                <option value="1">
                                    Single
                                </option>

                                <option value="2">
                                    Multiple
                                </option>

                            </select>

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Seq
                            </label>

                            <input type="text"
                                    name="seq"
                                    class="form-control"
                                    placeholder="001">

                        </div>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Test
                        </label>

                        <input type="text"
                               name="nama_test"
                               class="form-control"
                               required>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Test Group
                            </label>

                            <select name="test_group_id"
                                    class="form-select"
                                    required>

                                <option value="">
                                    Pilih Test Group
                                </option>

                               @foreach($groups as $group)

                                <option value="{{ $group->id }}">
                                    {{ $group->group_name }}
                                </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Print Group
                            </label>

                            <select name="print_group_id"
                                    class="form-select"
                                    required>

                                <option value="">
                                    Pilih Print Group
                                @foreach($prints as $group)

<option value="{{ $group->id }}">

    {{ $group->group_name }}

</option>

@endforeach

                            </select>

                        </div>

                    </div>

                    <div class="mb-3">

    <label class="form-label">
        Sample Type
    </label>

    <select name="sample_type_id"
            class="form-select">

        <option value="">
            Pilih Sample
        </option>

        @foreach($samples as $sample)

        <option value="{{ $sample->id }}">

            {{ $sample->sample_name }}

        </option>

        @endforeach

    </select>

</div>

                    <div class="row">

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Price
                            </label>

                            <input type="number"
                                   name="price"
                                   class="form-control"
                                   value="0">

                        </div>

                    </div>

                    <hr>

                    <h5>Print Setting</h5>

                    <div class="row">

                        <div class="col-md-2">

                            <div class="form-check">

                                <input class="form-check-input"
                                       type="checkbox"
                                       name="head">

                                <label class="form-check-label">
                                    Head
                                </label>

                            </div>

                        </div>

                        <div class="col-md-2">

                            <div class="form-check">

                                <input class="form-check-input"
                                       type="checkbox"
                                       name="bold">

                                <label class="form-check-label">
                                    Bold
                                </label>

                            </div>

                        </div>

                        <div class="col-md-2">

                            <div class="form-check">

                                <input class="form-check-input"
                                       type="checkbox"
                                       name="italic">

                                <label class="form-check-label">
                                    Italic
                                </label>

                            </div>

                        </div>

                        <div class="col-md-2">

                            <div class="form-check">

                                <input class="form-check-input"
                                       type="checkbox"
                                       name="is_print"
                                       checked>

                                <label class="form-check-label">
                                    Print
                                </label>

                            </div>

                        </div>

                    </div>

                    <hr>

                    <button type="submit"
                            class="btn btn-primary">

                        Simpan

                    </button>

                    <a href="/test-parameters"
                       class="btn btn-secondary">

                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection