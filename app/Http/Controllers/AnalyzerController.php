<?php

namespace App\Http\Controllers;

use App\Models\Analyzer;
use Illuminate\Http\Request;

class AnalyzerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $analyzers = Analyzer::orderBy('analyzer_name')->get();

    return view(
        'analyzers.index',
        compact('analyzers')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('analyzers.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([

        'analyzer_code'=>'required|unique:analyzers',

        'analyzer_name'=>'required',

        'category'=>'required'

    ]);

    Analyzer::create([

        'analyzer_code'=>strtoupper(
            $request->analyzer_code
        ),

        'analyzer_name'=>strtoupper(
            $request->analyzer_name
        ),

        'category'=>$request->category,

        'manufacturer'=>strtoupper(
            $request->manufacturer
        ),

        'is_active'=>$request->has('is_active')

    ]);

    return redirect('/analyzers');
}

    /**
     * Display the specified resource.
     */
    public function show(Analyzer $analyzer)
{
    return view(
        'analyzers.show',
        compact('analyzer')
    );
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Analyzer $analyzer)
{
    return view(
        'analyzers.edit',
        compact('analyzer')
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(
    Request $request,
    Analyzer $analyzer
)
{
    $request->validate([

        'analyzer_code' => 'required|unique:analyzers,analyzer_code,' . $analyzer->id,

        'analyzer_name' => 'required',

        'category' => 'required'

    ]);

    $analyzer->update([

        'analyzer_code' => strtoupper(
            $request->analyzer_code
        ),

        'analyzer_name' => strtoupper(
            $request->analyzer_name
        ),

        'category' => $request->category,

        'manufacturer' => strtoupper(
            $request->manufacturer
        ),

        'is_active' => $request->has('is_active')

    ]);

    return redirect('/analyzers')
        ->with('success', 'Data Analyzer berhasil diupdate.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Analyzer $analyzer)
{
    $analyzer->delete();

    return redirect('/analyzers')
        ->with('success', 'Analyzer berhasil dihapus.');
}
}
