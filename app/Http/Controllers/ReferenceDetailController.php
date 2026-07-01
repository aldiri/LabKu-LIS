<?php

namespace App\Http\Controllers;

use App\Models\ReferenceDetail;
use App\Models\ReferenceHeader;
use Illuminate\Http\Request;

class ReferenceDetailController extends Controller
{

/**
 * Cek overlap umur
 */
private function checkOverlap(
    $referenceHeaderId,
    $flag,
    $gender,
    $beginAge,
    $endAge,
    $ignoreId = null
)
{
    $query = ReferenceDetail::where(
            'reference_header_id',
            $referenceHeaderId
        )
        ->where('flag', $flag)
        ->where('gender', $gender);

    if ($ignoreId) {
        $query->where('id', '!=', $ignoreId);
    }

    return $query
        ->where(function ($q) use ($beginAge, $endAge) {

            $q->whereBetween('begin_age', [$beginAge, $endAge])

              ->orWhereBetween('end_age', [$beginAge, $endAge])

              ->orWhere(function ($qq) use ($beginAge, $endAge) {

                    $qq->where('begin_age', '<=', $beginAge)
                       ->where('end_age', '>=', $endAge);

              });

        })
        ->exists();
}
    /**
     * Format umur
     * 0050607
     */
    private function formatAge($year, $month, $day)
    {
        return
            str_pad($year, 3, '0', STR_PAD_LEFT) .
            str_pad($month, 2, '0', STR_PAD_LEFT) .
            str_pad($day, 2, '0', STR_PAD_LEFT);
    }

    /**
     * Detail Mapping
     */
    public function index(ReferenceHeader $reference)
    {
        $reference->load([
            'testParameter',
            'method',
            'details'
        ]);

        return view(
            'reference.detail',
            compact('reference')
        );
    }

    /**
     * Form Tambah Mapping
     */
    public function create(ReferenceHeader $reference)
    {
        return view(
            'reference.detail_create',
            compact('reference')
        );
    }

    /**
     * Simpan Mapping
     */
    public function store(Request $request, ReferenceHeader $reference)
    {
        $request->validate([

            'flag' => 'required',

            'gender' => 'required',

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

        $duplicate = ReferenceDetail::where(

                'reference_header_id',

                $reference->id

            )

            ->where(

                'flag',

                $request->flag

            )

            ->where(

                'gender',

                $request->gender

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

                    'duplicate' =>
                    'Mapping sudah ada.'

                ]);

        }

        if ($this->checkOverlap(

    $reference->id,

    $request->flag,

    $request->gender,

    $beginAge,

    $endAge

)) {

    return back()
        ->withInput()
        ->withErrors([
            'overlap' =>
            'Rentang umur bertabrakan dengan mapping yang sudah ada.'
        ]);

}

        ReferenceDetail::create([

            'reference_header_id' => $reference->id,

            'flag' => $request->flag,

            'gender' => $request->gender,

            'begin_age' => $beginAge,

            'end_age' => $endAge,

            'reference_value' => $request->reference_value,

            'lower_limit' => $request->lower_limit,

            'upper_limit' => $request->upper_limit

        ]);

        return redirect()

            ->route(

                'references.detail',

                $reference->id

            )

            ->with(

                'success',

                'Mapping berhasil ditambahkan.'

            );
    }

    /**
     * Form Edit
     */
    public function edit(ReferenceDetail $detail)
    {
        return view(
            'reference.detail_edit',
            compact('detail')
        );
    }

    /**
     * Update Mapping
     */
    public function update(
        Request $request,
        ReferenceDetail $detail
    )
    {
        $request->validate([

            'flag' => 'required',

            'gender' => 'required',

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
                    'Begin Age tidak boleh lebih besar.'

                ]);

        }

        $duplicate = ReferenceDetail::where(

                'reference_header_id',

                $detail->reference_header_id

            )

            ->where(

                'flag',

                $request->flag

            )

            ->where(

                'gender',

                $request->gender

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

                $detail->id

            )

            ->exists();

        if ($duplicate) {

            return back()

                ->withInput()

                ->withErrors([

                    'duplicate' =>
                    'Mapping sudah ada.'

                ]);

        }

        if ($this->checkOverlap(

    $detail->reference_header_id,

    $request->flag,

    $request->gender,

    $beginAge,

    $endAge,

    $detail->id

)) {

    return back()
        ->withInput()
        ->withErrors([
            'overlap' =>
            'Rentang umur bertabrakan dengan mapping yang sudah ada.'
        ]);

}

        $detail->update([

            'flag' => $request->flag,

            'gender' => $request->gender,

            'begin_age' => $beginAge,

            'end_age' => $endAge,

            'reference_value' => $request->reference_value,

            'lower_limit' => $request->lower_limit,

            'upper_limit' => $request->upper_limit

        ]);

        return redirect()

            ->route(

                'references.detail',

                $detail->reference_header_id

            )

            ->with(

                'success',

                'Mapping berhasil diupdate.'

            );
    }

    /**
     * Copy Mapping
     */
    public function copy(ReferenceDetail $detail)
    {
        $reference = ReferenceHeader::findOrFail(
            $detail->reference_header_id
        );

        return view(
            'reference.detail_create',
            [

                'reference' => $reference,

                'copy' => $detail

            ]
        );
    }

    /**
     * Delete Mapping
     */
    public function destroy(ReferenceDetail $detail)
    {
        $headerId = $detail->reference_header_id;

        $detail->delete();

        return redirect()

            ->route(

                'references.detail',

                $headerId

            )

            ->with(

                'success',

                'Mapping berhasil dihapus.'

            );
    }
}