<?php

namespace App\Http\Controllers;

use App\Models\Method;
use Illuminate\Http\Request;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $methods = Method::orderBy('method_name')->get();

    return view(
        'methods.index',
        compact('methods')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('methods.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([

        'method_code' => 'required|unique:methods',

        'method_name' => 'required'

    ]);

    Method::create([

        'method_code' => strtoupper($request->method_code),

        'method_name' => $request->method_name,

        'is_active' => $request->has('is_active')

    ]);

    return redirect('/methods')
        ->with('success','Method berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(Method $method)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Method $method)
{
    return view(
        'methods.edit',
        compact('method')
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(
    Request $request,
    Method $method
)
{
    $request->validate([

        'method_code' => 'required|unique:methods,method_code,' . $method->id,

        'method_name' => 'required'

    ]);

    $method->update([

        'method_code' => strtoupper($request->method_code),

        'method_name' => $request->method_name,

        'is_active' => $request->has('is_active')

    ]);

    return redirect('/methods')
        ->with('success','Method berhasil diupdate.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Method $method)
{
    $method->delete();

    return redirect('/methods')
        ->with('success','Method berhasil dihapus.');
}
}
