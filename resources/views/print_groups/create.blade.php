@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Tambah Print Group</h4>
    </div>

    <div class="card-body">

        <form action="/print-groups" method="POST">

            @csrf

            <div class="mb-3">

    <label>Print ID</label>

    <input type="text"
           name="print_id"
           class="form-control"
           placeholder="KIM"
           required>

</div>

<div class="mb-3">

    <label>Group Name</label>

    <input type="text"
           name="group_name"
           class="form-control"
           placeholder="KIMIA KLINIK"
           required>

</div>
            <button type="submit"
                    class="btn btn-primary">

                Simpan

            </button>

            <a href="/print-groups"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection