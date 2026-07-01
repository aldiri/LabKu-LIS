<?php

namespace App\Http\Controllers;

use App\Models\RegistrationSample;
use Illuminate\Http\Request;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;

class SampleCollectionController extends Controller
{
   public function index()
    {
        $samples = RegistrationSample::with([
            'registration.patient',
            'sampleType'
        ])
        ->orderByDesc('id')
        ->get();

        return view('sample_collections.index', compact('samples'));
    } 

    public function collect(RegistrationSample $sample)
    {
        $sample->update([
            'status' => 'COLLECTED',
            'collector' => 'ADMIN',
            'collection_time' => now(),
        ]);

        return back();
    }

    public function receive(RegistrationSample $sample)
    {
        $sample->update([
            'status' => 'RECEIVED',
            'received_time' => now(),
        ]);

        return back();
    }

    public function label(RegistrationSample $sample)
{
    return view(
        'sample_collections.label',
        compact('sample')
    );
}
}