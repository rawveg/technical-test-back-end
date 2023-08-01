<?php

namespace App\Http\Controllers;

use App\Http\Resources\FarmResource;
use App\Http\Resources\TurbineResource;
use App\Models\Farm;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return FarmResource::collection(Farm::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farm  $farm
     * @return \App\Http\Resources\FarmResource
     */
    public function show(Farm $farm)
    {
        return new FarmResource($farm);
    }

    /**
     * Display related Turbines
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function turbineIndex(Farm $farm)
    {
        return TurbineResource::collection($farm->turbines);
    }

    /**
     * Display a specific related Turbine
     *
     * @param  \App\Models\Farm  $farm
     * @param  string  $turbine
     * @return \App\Http\Resources\TurbineResource
     */
    public function showTurbine(Farm $farm, string $turbine)
    {
        return new TurbineResource($farm->turbines()->findOrFail($turbine));
    }
}
