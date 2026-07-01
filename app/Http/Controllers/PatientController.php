<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $patients = Patient::all();

    return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'norm' => 'required',
        'nama' => 'required',
        'jenis_kelamin' => 'required',
        'tanggal_lahir' => 'required',
    ]);

    Patient::create([
        'norm' => $request->norm,
        'nama' => $request->nama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tanggal_lahir' => $request->tanggal_lahir,
        'alamat' => $request->alamat,
    ]);

    return redirect('/patients');
}
    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $patient = Patient::findOrFail($id);

    return view('patients.edit', compact('patient'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $patient = Patient::findOrFail($id);

    $patient->update([
        'norm' => $request->norm,
        'nama' => $request->nama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tanggal_lahir' => $request->tanggal_lahir,
        'alamat' => $request->alamat,
    ]);

    return redirect('/patients');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $patient = Patient::findOrFail($id);

    $patient->delete();

    return redirect('/patients');
}
}
