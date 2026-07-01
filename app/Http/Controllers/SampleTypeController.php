<?php

namespace App\Http\Controllers;

use App\Models\SampleType;
use Illuminate\Http\Request;

class SampleTypeController extends Controller
{
    public function index()
    {
        $samples = SampleType::orderBy('sample_name')->get();

        return view(
            'sample_types.index',
            compact('samples')
        );
    }

    public function create()
    {
        return view('sample_types.create');
    }

    public function store(Request $request)
    {
        SampleType::create([

            'sample_id' => strtoupper($request->sample_id),

            'sample_name' => strtoupper($request->sample_name),

            'tube_color' => strtoupper($request->tube_color),

            'barcode_code'=>strtoupper($request->barcode_code),

            'description' => strtoupper($request->description)
            

        ]);

        return redirect('/sample-types')
            ->with('success','Sample berhasil ditambahkan');
    }

    public function edit(SampleType $sampleType)
    {
        return view(
            'sample_types.edit',
            compact('sampleType')
        );
    }

    public function update(Request $request, SampleType $sampleType)
    {
        $sampleType->update([

            'sample_id' => strtoupper($request->sample_id),

            'sample_name' => strtoupper($request->sample_name),

            'tube_color' => strtoupper($request->tube_color),
            
            'barcode_code'=>strtoupper($request->barcode_code),

            'description' => strtoupper($request->description)

        ]);

        return redirect('/sample-types')
            ->with('success','Sample berhasil diupdate');
    }

    public function destroy(SampleType $sampleType)
    {
        $sampleType->delete();

        return redirect('/sample-types')
            ->with('success','Sample berhasil dihapus');
    }
}