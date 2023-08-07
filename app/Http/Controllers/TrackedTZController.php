<?php

namespace App\Http\Controllers;

use App\Models\TrackedTZ;
use Illuminate\Http\Request;

class TrackedTZController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trackedTZs = TrackedTZ::all();

        return view('welcome')->with(['trackedTZs' => $trackedTZs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TrackedTZ $trackedTZ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrackedTZ $trackedTZ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrackedTZ $trackedTZ)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrackedTZ $trackedTZ)
    {
        //
    }
}
