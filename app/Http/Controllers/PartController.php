<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Requests\PartRequest;
use App\Http\Resources\PartResource;
use App\Models\Car;
use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return PartResource::collection(Part::latest()->paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartRequest $request)
    {
        $part = Part::create($request->validated());

        return new PartResource($part);

    }

    /**
     * Display the specified resource.
     */
    public function show(Part $part)
    {
        return new PartResource($part->load('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartRequest $request, Part $part)
    {
        $part->update($request->validated());
        return new PartResource($part);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Part $part)
    {
        $part->delete();
        return response()->noContent();
    }
}
