<?php

namespace App\Http\Controllers;

use App\Http\Resources\GradeResource;
use App\Http\Resources\InspectionResource;
use App\Models\Inspection;

class InspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return InspectionResource::collection(Inspection::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inspection  $inspection
     * @return \App\Http\Resources\InspectionResource
     */
    public function show(Inspection $inspection)
    {
        return new InspectionResource($inspection);
    }

    /**
     * Show grades for inspection
     *
     * @param  \App\Models\Inspection  $inspection
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function gradesIndex(Inspection $inspection)
    {
        return GradeResource::collection($inspection->grades);
    }

    /**
     * Show specific grade for inspection
     *
     * @param  \App\Models\Inspection  $inspection
     * @param  string  $grade
     * @return \App\Http\Resources\GradeResource
     */
    public function showGrade(Inspection $inspection, string $grade)
    {
        return new GradeResource($inspection->grades()->findOrFail($grade));
    }
}
