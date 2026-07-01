@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Tambah Test Group</h4>
    </div>

    <div class="card-body">

        <form action="/test-groups" method="POST">

            @csrf

            <div class="mb-3">
                <label>Group Code</label>

                <input type="text"
                       name="group_code"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Group Name</label>

                <input type="text"
                       name="group_name"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Seq</label>

                <input type="number"
                       name="seq"
                       class="form-control"
                       value="0">
            </div>

            <button class="btn btn-primary">
                Simpan
            </button>

            <a href="/test-groups"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection