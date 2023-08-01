<?php

namespace Tests;

use App\Models\Farm;
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

    public function farm()
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

    public function turbine()
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
}
