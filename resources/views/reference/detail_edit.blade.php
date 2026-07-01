@extends('layouts.app')

@section('content')

@php

$beginYear = intval(substr($detail->begin_age,0,3));
$beginMonth = intval(substr($detail->begin_age,3,2));
$beginDay = intval(substr($detail->begin_age,5,2));

$endYear = intval(substr($detail->end_age,0,3));
$endMonth = intval(substr($detail->end_age,3,2));
$endDay = intval(substr($detail->end_age,5,2));

@endphp

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h4>Edit Nilai Normal</h4>

        <a href="{{ route('references.detail',$detail->reference_header_id) }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Kembali

        </a>

    </div>

    <form action="{{ route('reference.detail.update',$detail->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

            @endif

            <div class="row">

                <div class="col-md-3">

                    <label>Flag</label>

                    <select name="flag" class="form-control">

                        <option value="NORMAL" {{ $detail->flag=='NORMAL'?'selected':'' }}>NORMAL</option>

                        <option value="LOW" {{ $detail->flag=='LOW'?'selected':'' }}>LOW</option>

                        <option value="HIGH" {{ $detail->flag=='HIGH'?'selected':'' }}>HIGH</option>

                        <option value="XLOW" {{ $detail->flag=='XLOW'?'selected':'' }}>XLOW</option>

                        <option value="XHIGH" {{ $detail->flag=='XHIGH'?'selected':'' }}>XHIGH</option>

                    </select>

                </div>

                <div class="col-md-3">

                    <label>Gender</label>

                    <select name="gender" class="form-control">

                        <option value="ALL" {{ $detail->gender=='ALL'?'selected':'' }}>ALL</option>

                        <option value="L" {{ $detail->gender=='L'?'selected':'' }}>Laki-laki</option>

                        <option value="P" {{ $detail->gender=='P'?'selected':'' }}>Perempuan</option>

                    </select>

                </div>

            </div>

            <hr>

            <div class="row">

                <div class="col-md-6">

                    <div class="card">

                        <div class="card-header">

                            Begin Age

                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col">

                                    <label>Tahun</label>

                                    <input type="number"
                                           name="begin_year"
                                           class="form-control"
                                           value="{{ $beginYear }}">

                                </div>

                                <div class="col">

                                    <label>Bulan</label>

                                    <input type="number"
                                           name="begin_month"
                                           class="form-control"
                                           value="{{ $beginMonth }}">

                                </div>

                                <div class="col">

                                    <label>Hari</label>

                                    <input type="number"
                                           name="begin_day"
                                           class="form-control"
                                           value="{{ $beginDay }}">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="card">

                        <div class="card-header">

                            End Age

                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col">

                                    <label>Tahun</label>

                                    <input type="number"
                                           name="end_year"
                                           class="form-control"
                                           value="{{ $endYear }}">

                                </div>

                                <div class="col">

                                    <label>Bulan</label>

                                    <input type="number"
                                           name="end_month"
                                           class="form-control"
                                           value="{{ $endMonth }}">

                                </div>

                                <div class="col">

                                    <label>Hari</label>

                                    <input type="number"
                                           name="end_day"
                                           class="form-control"
                                           value="{{ $endDay }}">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <hr>

            <div class="row">

                <div class="col-md-6">

                    <label>Reference Value</label>

                    <input type="text"
                           name="reference_value"
                           class="form-control"
                           value="{{ $detail->reference_value }}">

                </div>

                <div class="col-md-3">

                    <label>Lower Limit</label>

                    <input type="text"
                           name="lower_limit"
                           class="form-control"
                           value="{{ $detail->lower_limit }}">

                </div>

                <div class="col-md-3">

                    <label>Upper Limit</label>

                    <input type="text"
                           name="upper_limit"
                           class="form-control"
                           value="{{ $detail->upper_limit }}">

                </div>

            </div>

        </div>

        <div class="card-footer">

            <button class="btn btn-primary">

                <i class="fas fa-save"></i>

                Update

            </button>

            <a href="{{ route('references.detail',$detail->reference_header_id) }}"
               class="btn btn-secondary">

                Batal

            </a>

        </div>

    </form>

</div>

@endsection