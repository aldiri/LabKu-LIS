<?php

namespace App\Http\Controllers;

use App\Models\TestParameter;
use App\Models\SampleType;
use App\Models\TestGroup;
use App\Models\PrintGroup;
use Illuminate\Http\Request;

class TestParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $testParameters = TestParameter::with([
    'testGroup',
    'printGroup',
    'sampleType'
])->get();

return view('test_parameters.index', compact('testParameters'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $groups = TestGroup::orderBy('group_name')->get();

    $prints = PrintGroup::orderBy('group_name')->get();

    $samples = SampleType::orderBy('sample_name')->get();

    return view(
        'test_parameters.create',
        compact(
            'groups',
            'prints',
            'samples'
        )
    );
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    TestParameter::create([

'test_id'=>strtoupper($request->test_id),

'test_type'=>$request->test_type,

'nama_test'=>strtoupper($request->nama_test),

'test_group_id'=>$request->test_group_id,

'print_group_id'=>$request->print_group_id,

'sample_type_id'=>$request->sample_type_id,

'price'=>$request->price,

'seq'=>$request->seq,

'head'=>$request->head ? 1 : 0,

'bold'=>$request->bold ? 1 : 0,

'italic'=>$request->italic ? 1 : 0,

'is_print'=>$request->is_print ? 1 : 0

]);

    return redirect('/test-parameters');
}

    /**
     * Display the specified resource.
     */
    public function show(TestParameter $testParameter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestParameter $testParameter)
{
    $groups = TestGroup::orderBy('group_name')->get();

    $prints = PrintGroup::orderBy('group_name')->get();

    $samples = SampleType::orderBy('sample_name')->get();

    return view(
        'test_parameters.edit',
        compact(
            'testParameter',
            'groups',
            'prints',
            'samples'
        )
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(
    Request $request,
    TestParameter $testParameter
)
{
    $testParameter->update([

        'test_id' => strtoupper($request->test_id),

        'sample_type_id'=>$request->sample_type_id,

        'test_type' => $request->test_type,

        'nama_test' => strtoupper($request->nama_test),

        'test_group_id' => $request->test_group_id,

        'print_group_id' => $request->print_group_id,

        'price' => $request->price,

        'seq' => $request->seq,

        'head' => $request->has('head'),

        'bold' => $request->has('bold'),

        'italic' => $request->has('italic'),

        'is_print' => $request->has('is_print'),

    ]);

    return redirect('/test-parameters');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestParameter $testParameter)
    {
         $testParameter->delete();

    return redirect('/test-parameters');
    }
}
