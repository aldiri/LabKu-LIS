<?php

namespace App\Http\Controllers;

use App\Models\PrintGroup;
use Illuminate\Http\Request;

class PrintGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $printGroups = PrintGroup::orderBy('group_name')
        ->get();

    return view(
        'print_groups.index',
        compact('printGroups')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('print_groups.create');
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    PrintGroup::create([

        'print_id' => strtoupper(
            $request->print_id
        ),

        'group_name' => strtoupper(
            $request->group_name
        )

    ]);

    return redirect('/print-groups');
}
    /**
     * Update the specified resource in storage.
     */
    public function update(
    Request $request,
    PrintGroup $printGroup
)
{
    $printGroup->update([

        'print_id' => strtoupper(
            $request->print_id
        ),

        'group_name' => strtoupper(
            $request->group_name
        )

    ]);

    return redirect('/print-groups');
}

public function edit(PrintGroup $printGroup)
{
    return view(
        'print_groups.edit',
        compact('printGroup')
    );
}
    public function destroy(PrintGroup $printGroup)
{
    $printGroup->delete();

    return redirect('/print-groups');
}
}
