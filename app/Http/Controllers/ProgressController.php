<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProgressCollection;
use App\Http\Resources\ProgressResource;
use App\Models\Progress as ModelsProgress;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ProgressCollection(Progress::all());
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
    public function show(Request $request, Progress $progress)
    {
        return new ProgressResource($progress);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Progress $progress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Progress $progress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Progress $progress)
    {
        //
    }
}
