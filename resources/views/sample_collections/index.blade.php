@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between">

        <h4>Sample Collection</h4>

        <span class="badge bg-primary">

            {{ $samples->count() }} Sample

        </span>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover align-middle">

            <thead class="table-light">

                <tr>

                    <th>Barcode</th>

                    <th>No Registrasi</th>

                    <th>No RM</th>

                    <th>Pasien</th>

                    <th>Sample</th>

                    <th>Tube</th>

                    <th>Status</th>

                    <th>Collector</th>

                    <th>Collection Time</th>

                    <th width="180">Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($samples as $sample)

                <tr>

                    <td>

                        <strong>

                            {{ $sample->barcode }}

                        </strong>

                    </td>

                    <td>

                        {{ $sample->registration->no_reg }}

                    </td>

                    <td>

                        {{ $sample->registration->patient->norm }}

                    </td>

                    <td>

                        {{ $sample->registration->patient->nama }}

                    </td>

                    <td>

                        {{ $sample->sampleType->sample_name }}

                    </td>

                    <td>

                        {{ $sample->sampleType->tube_color }}

                    </td>

                    <td>

                        @switch($sample->status)

                            @case('WAITING')

                                <span class="badge bg-warning">

                                    WAITING

                                </span>

                            @break

                            @case('COLLECTED')

                                <span class="badge bg-success">

                                    COLLECTED

                                </span>

                            @break

                            @case('RECEIVED')

                                <span class="badge bg-info">

                                    RECEIVED

                                </span>

                            @break

                            @default

                                <span class="badge bg-secondary">

                                    {{ $sample->status }}

                                </span>

                        @endswitch

                    </td>

                    <td>

                        {{ $sample->collector ?? '-' }}

                    </td>

                    <td>

                        {{ $sample->collection_time ?? '-' }}

                    </td>

                    <td>

                        @if($sample->status=='WAITING')

                        <form
                            action="/sample-collections/{{ $sample->id }}/collect"
                            method="POST">

                            @csrf

                            <button
                                class="btn btn-success btn-sm">

                                Collect

                            </button>

                        </form>

                        @elseif($sample->status=='COLLECTED')

                        <form
                            action="/sample-collections/{{ $sample->id }}/receive"
                            method="POST">

                            @csrf

                            <button
                                class="btn btn-primary btn-sm">

                                Receive

                            </button>

                        </form>

                        @else

                        <span class="text-success">

                            ✔ COMPLETE

                        </span>
<a href="{{ route('sample.label',$sample->id) }}"
   target="_blank"
   class="btn btn-dark btn-sm">

    Label

</a>
                        @endif

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="10"
                        class="text-center">

                        Tidak ada sample.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection