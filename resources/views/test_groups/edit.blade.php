@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Edit Print Group</h4>
    </div>

    <div class="card-body">

        <form action="/print-groups/{{ $printGroup->id }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Print ID</label>

                <input type="text"
                       name="print_id"
                       class="form-control"
                       value="{{ $printGroup->print_id }}"
                       required>

            </div>

            <div class="mb-3">

                <label>Group Name</label>

                <input type="text"
                       name="group_name"
                       class="form-control"
                       value="{{ $printGroup->group_name }}"
                       required>

            </div>

            <button type="submit"
                    class="btn btn-primary">

                Update

            </button>

            <a href="/print-groups"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection