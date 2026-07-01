<?php

namespace App\Http\Controllers;

use App\Models\TestGroup;
use Illuminate\Http\Request;

class TestGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $testGroups = TestGroup::orderBy('seq')->get();

    return view(
        'test_groups.index',
        compact('testGroups')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('test_groups.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    TestGroup::create([

        'group_code' => $request->group_code,

        'group_name' => $request->group_name,

        'seq' => $request->seq

    ]);

    return redirect('/test-groups');
}

    /**
     * Display the specified resource.
     */
    public function show(TestGroup $testGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestGroup $testGroup)
{
    return view(
        'test_groups.edit',
        compact('testGroup')
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(
    Request $request,
    TestGroup $testGroup
)
{
    $testGroup->update([

        'group_code' => $request->group_code,

        'group_name' => $request->group_name,

        'seq' => $request->seq

    ]);

    return redirect('/test-groups');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestGroup $testGroup)
{
    $testGroup->delete();

    return redirect('/test-groups');
}
}
