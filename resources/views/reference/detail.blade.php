@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h3 class="mb-1">

                    {{ $reference->testParameter->nama_test }}

                </h3>

                <table class="table table-borderless table-sm mb-0">

                    <tr>

                        <th width="140">

                            Test ID

                        </th>

                        <td>

                            {{ $reference->testParameter->test_id }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Method

                        </th>

                        <td>

                            {{ $reference->method->method_name }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Result Format

                        </th>

                        <td>

                            {{ $reference->result_format }}

                        </td>

                    </tr>

                </table>

            </div>

            <div>

                <a href="{{ route('references.index') }}"
                   class="btn btn-secondary">

                    <i class="fas fa-arrow-left"></i>

                    Kembali

                </a>
<button
class="btn btn-success"
data-toggle="modal"
data-target="#copyModal">

<i class="fas fa-copy"></i>

Copy Semua Mapping

</button>

<div class="modal fade" id="copyModal">

<div class="modal-dialog">

<div class="modal-content">

<form

method="POST"

action="{{ route('references.copy.mapping',$reference->id) }}">

@csrf

<div class="modal-header">

<h5>

Copy Semua Mapping

</h5>

</div>

<div class="modal-body">

<label>

Reference Tujuan

</label>

<select

name="target_reference_id"

class="form-control select2">

@foreach(App\Models\ReferenceHeader::with('testParameter','method')->get() as $item)

@if($item->id != $reference->id)

<option value="{{ $item->id }}">

{{ $item->testParameter->nama_test }}

-

{{ $item->method->method_name }}

</option>

@endif

@endforeach

</select>

</div>

<div class="modal-footer">

<button

class="btn btn-primary">

Copy

</button>

</div>

</form>

</div>

</div>

</div>
                <a href="{{ route('references.detail.create',$reference->id) }}"
                   class="btn btn-primary">

                    <i class="fas fa-plus"></i>

                    Tambah Nilai Normal

                </a>

            </div>

        </div>

    </div>

    <div class="card-body">

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="thead-light">

                    <tr>

                        <th width="110">

                            Flag

                        </th>

                        <th width="100">

                            Gender

                        </th>

                        <th width="180">

                            Begin Age

                        </th>

                        <th width="180">

                            End Age

                        </th>

                        <th>

                            Reference Value

                        </th>

                        <th width="130">

                            Lower Limit

                        </th>

                        <th width="130">

                            Upper Limit

                        </th>

                        <th width="170">

                            Action

                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($reference->details as $detail)

                <tr>

                    <td>

                        @switch($detail->flag)

                            @case('NORMAL')

                                <span class="badge badge-success">

                                    NORMAL

                                </span>

                            @break

                            @case('LOW')

                                <span class="badge badge-warning">

                                    LOW

                                </span>

                            @break

                            @case('HIGH')

                                <span class="badge badge-warning">

                                    HIGH

                                </span>

                            @break

                            @case('XLOW')

                                <span class="badge badge-danger">

                                    XLOW

                                </span>

                            @break

                            @case('XHIGH')

                                <span class="badge badge-danger">

                                    XHIGH

                                </span>

                            @break

                        @endswitch

                    </td>

                    <td>

                        @if($detail->gender=='ALL')

                            ALL

                        @elseif($detail->gender=='L')

                            Laki-laki

                        @else

                            Perempuan

                        @endif

                    </td>

                    <td>

                        {{ $detail->begin_age_text }}

                    </td>

                    <td>

                        {{ $detail->end_age_text }}

                    </td>

                    <td>

                        {{ $detail->reference_value }}

                    </td>

                    <td>

                        {{ $detail->lower_limit }}

                    </td>

                    <td>

                        {{ $detail->upper_limit }}

                    </td>

                    <td>

                        <a href="{{ route('reference.detail.edit',$detail->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                        </a>

                        <a href="{{ route('reference.detail.copy',$detail->id) }}"
                           class="btn btn-info btn-sm">

                            <i class="fas fa-copy"></i>

                        </a>

                        <form
                            action="{{ route('reference.detail.destroy',$detail->id) }}"
                            method="POST"
                            style="display:inline">

                            @csrf

                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus mapping ini ?')">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8"
                        class="text-center">

                        Belum ada mapping nilai normal.

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection