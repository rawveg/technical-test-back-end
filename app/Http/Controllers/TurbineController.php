<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComponentResource;
use App\Http\Resources\TurbineResource;
use App\Models\Turbine;

class TurbineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return TurbineResource::collection(Turbine::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turbine  $turbine
     * @return \App\Http\Resources\TurbineResource
     */
    public function show(Turbine $turbine)
    {
        return new TurbineResource($turbine);
    }

    /**
     * Display components collection for turbine
     *
     * @param  \App\Models\Turbine  $turbine
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function componentsIndex(Turbine $turbine)
    {
        return ComponentResource::collection($turbine->components);
    }

    /**
     * Display specific component for turbine
     *
     * @param  \App\Models\Turbine  $turbine
     * @param  string  $component
     * @return \App\Http\Resources\ComponentResource
     */
    public function showComponent(Turbine $turbine, string $component)
    {
        return new ComponentResource($turbine->components()->findOrFail($component));
    }
}
