<?php

namespace App\Http\Controllers;

use App\Models\ReferenceRange;
use App\Models\TestParameter;
use App\Models\Method;
use Illuminate\Http\Request;

class ReferenceRangeController extends Controller
{
    /**
     * Format umur menjadi YYYMMDD
     */
    private function formatAge($year, $month, $day)
    {
        return
            str_pad($year, 3, '0', STR_PAD_LEFT) .
            str_pad($month, 2, '0', STR_PAD_LEFT) .
            str_pad($day, 2, '0', STR_PAD_LEFT);
    }

    /**
     * Tampilkan daftar reference
     */
    public function index()
    {
        $references = ReferenceRange::with([
            'testParameter',
            'method'
        ])
        ->orderBy('test_parameter_id')
        ->orderBy('method_id')
        ->orderBy('gender')
        ->orderBy('flag')
        ->get();

        return view(
            'reference_ranges.index',
            compact('references')
        );
    }

    /**
     * Form tambah
     */
    public function create()
    {
        $tests = TestParameter::orderBy('nama_test')->get();

        $methods = Method::where(
            'is_active',
            1
        )
        ->orderBy('method_name')
        ->get();

        return view(
            'reference_ranges.create',
            compact(
                'tests',
                'methods'
            )
        );
    }

        /**
     * Simpan Reference Range
     */
    public function store(Request $request)
    {
        $request->validate([

            'test_parameter_id' => 'required',

            'method_id' => 'required',

            'gender' => 'required',

            'flag' => 'required',

            'reference_value' => 'required'

        ]);

        $beginAge = $this->formatAge(
            $request->begin_year,
            $request->begin_month,
            $request->begin_day
        );

        $endAge = $this->formatAge(
            $request->end_year,
            $request->end_month,
            $request->end_day
        );

        if ($beginAge > $endAge) {

            return back()
                ->withInput()
                ->withErrors([
                    'begin_age' => 'Begin Age tidak boleh lebih besar dari End Age.'
                ]);

        }

        $duplicate = ReferenceRange::where(
                'test_parameter_id',
                $request->test_parameter_id
            )
            ->where(
                'method_id',
                $request->method_id
            )
            ->where(
                'gender',
                $request->gender
            )
            ->where(
                'flag',
                $request->flag
            )
            ->where(
                'begin_age',
                $beginAge
            )
            ->where(
                'end_age',
                $endAge
            )
            ->exists();

        if ($duplicate) {

            return back()
                ->withInput()
                ->withErrors([
                    'duplicate' => 'Reference Range sudah ada.'
                ]);

        }

        ReferenceRange::create([

            'test_parameter_id' => $request->test_parameter_id,

            'method_id' => $request->method_id,

            'result_format' => $request->result_format,

            'gender' => $request->gender,

            'flag' => $request->flag,

            'begin_age' => $beginAge,

            'end_age' => $endAge,

            'reference_value' => $request->reference_value,

            'batas_awal' => $request->batas_awal,

            'batas_akhir' => $request->batas_akhir,

            'is_active' => $request->has('is_active')

        ]);

        return redirect()
            ->route('reference-ranges.index')
            ->with(
                'success',
                'Reference Range berhasil disimpan.'
            );
    }

        /**
     * Form Edit
     */
    public function edit(ReferenceRange $referenceRange)
    {
        $tests = TestParameter::orderBy('nama_test')->get();

        $methods = Method::where(
            'is_active',
            1
        )
        ->orderBy('method_name')
        ->get();

        return view(
            'reference_ranges.edit',
            compact(
                'referenceRange',
                'tests',
                'methods'
            )
        );
    }

    /**
     * Update Reference Range
     */
    public function update(
        Request $request,
        ReferenceRange $referenceRange
    )
    {
        $request->validate([

            'test_parameter_id' => 'required',

            'method_id' => 'required',

            'gender' => 'required',

            'flag' => 'required',

            'reference_value' => 'required'

        ]);

        $beginAge = $this->formatAge(
            $request->begin_year,
            $request->begin_month,
            $request->begin_day
        );

        $endAge = $this->formatAge(
            $request->end_year,
            $request->end_month,
            $request->end_day
        );

        if ($beginAge > $endAge) {

            return back()
                ->withInput()
                ->withErrors([
                    'begin_age' =>
                    'Begin Age tidak boleh lebih besar dari End Age.'
                ]);

        }

        $duplicate = ReferenceRange::where(
                'test_parameter_id',
                $request->test_parameter_id
            )
            ->where(
                'method_id',
                $request->method_id
            )
            ->where(
                'gender',
                $request->gender
            )
            ->where(
                'flag',
                $request->flag
            )
            ->where(
                'begin_age',
                $beginAge
            )
            ->where(
                'end_age',
                $endAge
            )
            ->where(
                'id',
                '!=',
                $referenceRange->id
            )
            ->exists();

        if ($duplicate) {

            return back()
                ->withInput()
                ->withErrors([
                    'duplicate' =>
                    'Reference Range sudah ada.'
                ]);

        }

        $referenceRange->update([

            'test_parameter_id' =>
            $request->test_parameter_id,

            'method_id' =>
            $request->method_id,

            'result_format' =>
            $request->result_format,

            'gender' =>
            $request->gender,

            'flag' =>
            $request->flag,

            'begin_age' =>
            $beginAge,

            'end_age' =>
            $endAge,

            'reference_value' =>
            $request->reference_value,

            'batas_awal' =>
            $request->batas_awal,

            'batas_akhir' =>
            $request->batas_akhir,

            'is_active' =>
            $request->has('is_active')

        ]);

        return redirect()
            ->route('reference-ranges.index')
            ->with(
                'success',
                'Reference Range berhasil diupdate.'
            );
    }

    /**
     * Hapus Reference Range
     */
    public function destroy(
        ReferenceRange $referenceRange
    )
    {
        $referenceRange->delete();

        return redirect()
            ->route('reference-ranges.index')
            ->with(
                'success',
                'Reference Range berhasil dihapus.'
            );
    }
}