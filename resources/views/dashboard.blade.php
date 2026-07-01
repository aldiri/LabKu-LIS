@extends('layouts.app')

@section('content')

<h2>Dashboard</h2>

<div class="row">

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Total Pasien</h5>
                <h1>{{ $totalPatients }}</h1>
            </div>
        </div>
    </div>
    </div>
<br> 
    <div class="row">

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Total Dokter</h5>
                <h1>{{ $totalDoctors }}</h1>
            </div>
        </div>
    </div>
</div>
<br>
    <div class="row">

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Pasien Laboratorium</h5>
                <h1>{{ $totalRegistrations }}</h1>
            </div>
    </div>
</div>
</br>  

@endsection