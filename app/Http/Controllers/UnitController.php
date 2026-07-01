<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $units = Unit::orderBy('unit_name')->get();

    return view(
        'units.index',
        compact('units')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('units.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([

        'unit_code'=>'required|unique:units',

        'unit_name'=>'required'

    ]);

    Unit::create([

        'unit_code'=>strtoupper($request->unit_code),

        'unit_name'=>$request->unit_name,

        'is_active'=>$request->has('is_active')

    ]);

    return redirect('/units');
}

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
{
    return view(
        'units.edit',
        compact('unit')
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(
Request $request,
Unit $unit)
{

$request->validate([

'unit_code'=>'required|unique:units,unit_code,'.$unit->id,

'unit_name'=>'required'

]);

$unit->update([

'unit_code'=>strtoupper($request->unit_code),

'unit_name'=>$request->unit_name,

'is_active'=>$request->has('is_active')

]);

return redirect('/units');

}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
{

$unit->delete();

return redirect('/units');

}
}
