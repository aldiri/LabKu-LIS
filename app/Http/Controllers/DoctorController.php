<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();

        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Doctor::create([
            'kode_dokter' => $request->kode_dokter,
            'nama' => $request->nama,
            'spesialis' => $request->spesialis,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
        ]);

        return redirect('/doctors');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
      public function edit(string $id)
{
    $doctor = Doctor::findOrFail($id);

    return view('doctors.edit', compact('doctor'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $doctor = Doctor::findOrFail($id);

        $doctor->update([
            'kode_dokter' => $request->kode_dokter,
            'nama' => $request->nama,
            'spesialis' => $request->spesialis,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
        ]);

        return redirect('/doctors');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $doctor = Doctor::findOrFail($id);

    $doctor->delete();

    return redirect('/doctors');
}
}
