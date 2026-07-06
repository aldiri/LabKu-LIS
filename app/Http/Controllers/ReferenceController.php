<?php

namespace App\Http\Controllers;

use App\Models\Method;
use App\Models\ReferenceHeader;
use App\Models\TestParameter;
use Illuminate\Http\Request;
use App\Models\ReferenceDetail;
use Illuminate\Support\Facades\DB;
use App\Models\Unit;

class ReferenceController extends Controller
{
    /**
     * Display Listing
     */
    public function index()
{
    $references = ReferenceHeader::with([
        'testParameter',
        'method',
        'unit'
    ])
    ->orderBy('test_parameter_id')
    ->paginate(20);

    return view(
        'reference.index',
        compact('references')
    );
}

    /**
     * Create Form
     */
    public function create()
{
    $tests = TestParameter::orderBy('nama_test')->get();

    $methods = Method::orderBy('method_name')->get();

    $units = Unit::orderBy('unit_name')->get();

    return view(
        'reference.create',
        compact(
            'tests',
            'methods',
            'units'
        )
    );
}

    /**
     * Store
     */
    public function store(Request $request)
{
    $request->validate([

        'test_parameter_id' => 'required',

        'method_id' => 'required',

        'unit_id' => 'required',

    ]);

    ReferenceHeader::create([

        'test_parameter_id' => $request->test_parameter_id,

        'method_id' => $request->method_id,

        'unit_id' => $request->unit_id,

        'result_format' => $request->result_format,

        'is_active' => $request->has('is_active')

    ]);

    return redirect()
        ->route('references.index')
        ->with(
            'success',
            'Reference berhasil ditambahkan.'
        );
}

    /**
     * Edit Form
     */
   public function edit(
    ReferenceHeader $reference
)
{
    $tests = TestParameter::orderBy('nama_test')->get();

    $methods = Method::orderBy('method_name')->get();

    $units = Unit::orderBy('unit_name')->get();

    return view(
        'reference.edit',
        compact(
            'reference',
            'tests',
            'methods',
            'units'
        )
    );
}

    /**
     * Update
     */
    public function update(
    Request $request,
    ReferenceHeader $reference
)
{
    $request->validate([

        'test_parameter_id' => 'required',

        'method_id' => 'required',

        'unit_id' => 'required',

    ]);

    $reference->update([

        'test_parameter_id' => $request->test_parameter_id,

        'method_id' => $request->method_id,

        'unit_id' => $request->unit_id,

        'result_format' => $request->result_format,

        'is_active' => $request->has('is_active')

    ]);

    return redirect()
        ->route('references.index')
        ->with(
            'success',
            'Reference berhasil diupdate.'
        );
}

    /**
     * Delete
     */
    public function destroy(
    ReferenceHeader $reference
)
{
    $reference->delete();

    return redirect()
        ->route('references.index')
        ->with(
            'success',
            'Reference berhasil dihapus.'
        );
}

    public function copyMapping(Request $request, ReferenceHeader $reference)
{
    $request->validate([

        'target_reference_id' => 'required|exists:reference_headers,id'

    ]);

    if($reference->id == $request->target_reference_id){

        return back()->withErrors([

            'copy' => 'Reference tujuan tidak boleh sama.'

        ]);

    }

    DB::beginTransaction();

    try{

        $target = ReferenceHeader::findOrFail(
            $request->target_reference_id
        );

        foreach($reference->details as $detail){

            ReferenceDetail::updateOrCreate(

                [

                    'reference_header_id'=>$target->id,

                    'flag'=>$detail->flag,

                    'gender'=>$detail->gender,

                    'begin_age'=>$detail->begin_age,

                    'end_age'=>$detail->end_age

                ],

                [

                    'reference_value'=>$detail->reference_value,

                    'lower_limit'=>$detail->lower_limit,

                    'upper_limit'=>$detail->upper_limit

                ]

            );

        }

        DB::commit();

        return back()->with(

            'success',

            'Copy Mapping berhasil.'

        );

    }catch(\Exception $e){

        DB::rollBack();

        return back()->withErrors([

            'copy'=>$e->getMessage()

        ]);

    }

}
}