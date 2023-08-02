<?php

use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ComponentTypeController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GradeTypeController;
use App\Http\Controllers\InspectionController;
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
    Route::apiResource('component-types', ComponentTypeController::class)->only(['index', 'show']);
    Route::apiResource('grade-types', GradeTypeController::class)->only(['index', 'show']);
    Route::apiResource('grades', GradeController::class)->only(['index', 'show']);
    Route::apiResource('inspections', InspectionController::class)->only(['index', 'show']);

    Route::group(['prefix' => 'farms/{farm}/turbines'], function () {
        Route::get('/', [FarmController::class, 'turbineIndex'])->name('farms.turbines.index');
        Route::get('/{turbine}', [FarmController::class, 'showTurbine'])->name('farms.turbines.show');
    });

    Route::group(['prefix' => 'turbines'], function () {
        Route::get('/', [TurbineController::class, 'index'])->name('turbines.index');
        Route::get('/{turbine}', [TurbineController::class, 'show'])->name('turbines.show');
        Route::group(['prefix' => '/{turbine}/components'], function () {
            Route::get('/', [TurbineController::class, 'componentsIndex'])->name('turbines.components.index');
            Route::get('/{component}', [TurbineController::class, 'showComponent'])
                ->name('turbines.components.show');
        });
        Route::group(['prefix' => '/{turbine}/inspections'], function () {
            Route::get('/', [TurbineController::class, 'inspectionsIndex'])->name('turbines.inspections.index');
            Route::get('/{inspection}', [TurbineController::class, 'showInspection'])
                ->name('turbines.inspections.show');
        });
    });

    Route::group(['prefix' => 'components'], function () {
        Route::get('/', [ComponentController::class, 'index'])->name('components.index');
        Route::get('/{component}', [ComponentController::class, 'show'])->name('components.show');
        Route::group(['prefix' => '/{component}/grades'], function () {
            Route::get('/', [ComponentController::class, 'gradesIndex'])->name('components.grades.index');
            Route::get('/{grade}', [ComponentController::class, 'showGrade'])
                ->name('components.grades.show');
        });
    });

});
