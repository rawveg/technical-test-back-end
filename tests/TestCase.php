<?php

namespace Tests;

use App\Models\Component;
use App\Models\ComponentType;
use App\Models\Farm;
use App\Models\GradeType;
use App\Models\Turbine;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, WithFaker, DatabaseMigrations;

    private ?Farm $farm = null;
    private ?Turbine $turbine = null;
    private ?ComponentType $componentType = null;
    private ?Component $component = null;
    private ?GradeType $gradeType = null;

    /**
     * @return \App\Models\Farm
     */
    public function farm(): Farm
    {
        $this->farm ??= Farm::factory()->create(
            [
                'name' => 'Test Farm',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        return $this->farm;
    }

    /**
     * @return \App\Models\Turbine
     */
    public function turbine(): Turbine
    {
        $this->turbine ??= Turbine::factory()->create(
            [
                'name' => 'Test Turbine',
                'farm_id' => $this->farm()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        return $this->turbine;
    }

    /**
     * @return \App\Models\ComponentType
     */
    public function componentType(): ComponentType
    {
        $this->componentType ??= ComponentType::factory()->create(
            [
                'name' => 'Test Component Type',
            ]
        );
        return $this->componentType;
    }

    /**
     * @return \App\Models\Component
     */
    public function componentItem(): Component
    {
        $this->component ??= Component::factory()->create(
            [
                'component_type_id' => $this->componentType()->id,
                'turbine_id' => $this->turbine()->id,
            ]
        );
        return $this->component;
    }

    /**
     * @return \App\Models\GradeType
     */
    public function gradeType(): GradeType
    {
        $this->gradeType ??= GradeType::factory()->create(
            [
                'name' => 'Test Grade Type',
            ]
        );
        return $this->gradeType;
    }
}
