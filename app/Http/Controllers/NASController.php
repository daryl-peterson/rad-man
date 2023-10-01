<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNASRequest;
use App\Http\Requests\UpdateNASRequest;
use App\Models\NAS;
use Inertia\Inertia;

class NASController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('NAS/List', ['list' => NAS::listing()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNASRequest $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(NAS $NAS)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $object = NAS::find($id)->first();

        return Inertia::render('NAS/Edit', ['user' => auth()->user(), 'object' => $object]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNASRequest $request, NAS $NAS)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NAS $NAS)
    {
    }
}
