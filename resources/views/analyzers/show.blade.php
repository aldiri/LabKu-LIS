@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between">

        <h4>{{ $analyzer->analyzer_name }}</h4>

        @if($analyzer->is_active)

            <span class="badge bg-success">

                ACTIVE

            </span>

        @else

            <span class="badge bg-danger">

                INACTIVE

            </span>

        @endif

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>

                <th width="220">

                    Analyzer Code

                </th>

                <td>

                    {{ $analyzer->analyzer_code }}

                </td>

            </tr>

            <tr>

                <th>

                    Analyzer Name

                </th>

                <td>

                    {{ $analyzer->analyzer_name }}

                </td>

            </tr>

            <tr>

                <th>

                    Category

                </th>

                <td>

                    {{ $analyzer->category }}

                </td>

            </tr>

            <tr>

                <th>

                    Manufacturer

                </th>

                <td>

                    {{ $analyzer->manufacturer ?: '-' }}

                </td>

            </tr>

            <tr>

                <th>

                    Created

                </th>

                <td>

                    {{ $analyzer->created_at }}

                </td>

            </tr>

        </table>

        <hr>

        <div class="row">

            <div class="col-md-3">

                <div class="card border-primary">

                    <div class="card-body text-center">

                        <h5>Mapped Test</h5>

                        <h2>0</h2>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card border-warning">

                    <div class="card-body text-center">

                        <h5>Pending Sample</h5>

                        <h2>0</h2>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card border-info">

                    <div class="card-body text-center">

                        <h5>Processing</h5>

                        <h2>0</h2>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card border-success">

                    <div class="card-body text-center">

                        <h5>Completed Today</h5>

                        <h2>0</h2>

                    </div>

                </div>

            </div>

        </div>

        <hr>

        <div class="mt-3">

<a href="/analyzers/{{ $analyzer->id }}/edit"
class="btn btn-warning">

Edit

</a>

<a href="/analyzers/{{ $analyzer->id }}/mapping"
class="btn btn-primary">

Test Mapping

</a>

<a href="/analyzers/{{ $analyzer->id }}/interface"
class="btn btn-success">

Interface

</a>

<a href="/analyzers"
class="btn btn-secondary">

Kembali

</a>

</div>

</div>

@endsection