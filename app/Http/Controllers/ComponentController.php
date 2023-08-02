<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComponentResource;
use App\Http\Resources\GradeResource;
use App\Models\Component;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ComponentResource::collection(Component::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Component  $component
     * @return \App\Http\Resources\ComponentResource
     */
    public function show(Component $component)
    {
        return new ComponentResource($component);
    }

    /**
     * Display grades collection for component
     *
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function gradesIndex(Component $component)
    {
        return GradeResource::collection($component->grades);
    }

    /**
     * Show specific grade for a component
     *
     * @param  \App\Models\Component  $component
     * @param  string  $grade
     * @return \App\Http\Resources\GradeResource
     */
    public function showGrade(Component $component, string $grade)
    {
        return new GradeResource($component->grades()->findOrFail($grade));
    }
}
