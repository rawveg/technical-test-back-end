<?php

use App\Http\Controllers\ComponentTypeController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\TurbineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([], function () {
    Route::apiResource('farms', FarmController::class)->only(['index', 'show']);
    Route::apiResource('turbines', TurbineController::class)->only(['index', 'show']);
    Route::apiResource('component-types', ComponentTypeController::class)->only(['index', 'show']);

    Route::group(['prefix' => 'farms/{farm}/turbines'], function () {
        Route::get('/', [FarmController::class, 'turbineIndex'])->name('farms.turbines.index');
        Route::get('/{turbine}', [FarmController::class, 'showTurbine'])->name('farms.turbines.show');
    });
});
