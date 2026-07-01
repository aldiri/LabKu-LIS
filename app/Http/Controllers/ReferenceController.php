<?php

namespace App\Http\Controllers;

use App\Models\Method;
use App\Models\ReferenceHeader;
use App\Models\TestParameter;
use Illuminate\Http\Request;
use App\Models\ReferenceDetail;
use Illuminate\Support\Facades\DB;

class ReferenceController extends Controller
{
    /**
     * Display Listing
     */
    public function index(Request $request)
    {
        $query = ReferenceHeader::with([
            'testParameter',
            'method'
        ])->withCount('details');

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->whereHas('testParameter', function ($test) use ($search) {

                    $test->where('test_id', 'like', "%{$search}%")
                        ->orWhere('nama_test', 'like', "%{$search}%");

                });

                $q->orWhereHas('method', function ($method) use ($search) {

                    $method->where('method_name', 'like', "%{$search}%");

                });

            });

        }

        $references = $query
            ->orderBy('test_parameter_id')
            ->paginate(20)
            ->withQueryString();

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

        return view(
            'reference.create',
            compact(
                'tests',
                'methods'
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

            'method_id' => 'required'

        ]);

        $duplicate = ReferenceHeader::where(
                'test_parameter_id',
                $request->test_parameter_id
            )
            ->where(
                'method_id',
                $request->method_id
            )
            ->exists();

        if ($duplicate) {

            return back()
                ->withInput()
                ->withErrors([

                    'duplicate' =>
                    'Reference sudah ada.'

                ]);

        }

        ReferenceHeader::create([

            'test_parameter_id' => $request->test_parameter_id,

            'method_id' => $request->method_id,

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

        return view(
            'reference.edit',
            compact(
                'reference',
                'tests',
                'methods'
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

            'method_id' => 'required'

        ]);

        $duplicate = ReferenceHeader::where(
                'test_parameter_id',
                $request->test_parameter_id
            )
            ->where(
                'method_id',
                $request->method_id
            )
            ->where(
                'id',
                '!=',
                $reference->id
            )
            ->exists();

        if ($duplicate) {

            return back()
                ->withInput()
                ->withErrors([

                    'duplicate' =>
                    'Reference sudah ada.'

                ]);

        }

        $reference->update([

            'test_parameter_id' => $request->test_parameter_id,

            'method_id' => $request->method_id,

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
        if ($reference->details()->count() > 0) {

            return back()->withErrors([

                'delete' =>
                'Reference tidak dapat dihapus karena masih mempunyai Mapping Nilai Normal.'

            ]);

        }

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