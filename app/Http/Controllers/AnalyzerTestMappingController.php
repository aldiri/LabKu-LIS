<?php

namespace App\Http\Controllers;

use App\Models\Analyzer;
use App\Models\TestParameter;
use App\Models\AnalyzerTestMapping;
use App\Models\Method;
use App\Models\Unit;
use Illuminate\Http\Request;

class AnalyzerTestMappingController extends Controller
{
    public function index(Analyzer $analyzer)
    {
        $tests = TestParameter::orderBy('nama_test')->get();

        $methods = Method::where('is_active',1)
                    ->orderBy('method_name')
                    ->get();

        $units = Unit::where('is_active',1)
                    ->orderBy('unit_name')
                    ->get();

        $mappings = AnalyzerTestMapping::where(
            'analyzer_id',
            $analyzer->id
        )->get()->keyBy('test_parameter_id');

        return view(
            'analyzer_test_mappings.index',
            compact(
                'analyzer',
                'tests',
                'methods',
                'units',
                'mappings'
            )
        );
    }

    public function store(Request $request, Analyzer $analyzer)
    {
        AnalyzerTestMapping::where(
            'analyzer_id',
            $analyzer->id
        )->delete();

        foreach($request->mapping ?? [] as $testId => $item){

            if(isset($item['active'])){

                AnalyzerTestMapping::create([

                    'analyzer_id'=>$analyzer->id,

                    'test_parameter_id'=>$testId,

                    'method_id'=>$item['method_id'],

                    'unit_id'=>$item['unit_id'],

                    'is_active'=>1

                ]);

            }

        }

        return redirect()
            ->back()
            ->with('success','Mapping berhasil disimpan.');

    }
}