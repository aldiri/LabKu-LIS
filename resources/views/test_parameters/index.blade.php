@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between">

        <h4>Master Test Parameter</h4>

        <a href="/test-parameters/create"
           class="btn btn-primary">

            Tambah

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th>Test ID</th>

                    <th>Nama Test</th>

                    <th>Type</th>

                    <th>Test Group</th>

                    <th>Print Group</th>

                    <th>Price</th>

                    <th>Seq</th>

                    <th>Print</th>

                    <th>Sample</th>

                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @foreach($testParameters as $test)

                <tr>

                    <td>{{ $test->test_id }}</td>

                    <td>{{ $test->nama_test }}</td>

                    <td>

                        @if($test->test_type == 1)

                            <span class="badge bg-success">
                                SINGLE
                            </span>

                        @else

                            <span class="badge bg-primary">
                                MULTIPLE
                            </span>

                        @endif

                    </td>

                    <td>
                        {{ $test->testGroup->group_name ?? '-' }}
                    </td>

                    <td>
                        {{ $test->printGroup->group_name ?? '-' }}
                    </td>

                    <td>
                        {{ number_format($test->price,0,',','.') }}
                    </td>

                    <td>
                        {{ $test->seq }}
                    </td>

                    <td>

                        @if($test->is_print)

                            ✅

                        @else

                            ❌

                        @endif

                    </td>
<td>
    {{ $test->sampleType?->sample_name ?? '-' }}
</td>
                    <td>

                        <a href="/test-parameters/{{ $test->id }}/edit"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="/test-parameters/{{ $test->id }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection