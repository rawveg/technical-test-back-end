<?php

namespace Database\Seeders;

use App\Models\Component;
use App\Models\ComponentType;
use App\Models\Grade;
use App\Models\GradeType;
use App\Models\Inspection;
use App\Models\Turbine;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Turbine::all()->each(function ($turbine) {
            Grade::factory()
                ->for(Inspection::factory()->for($turbine)->create())
                ->for(
                    Component::factory()
                        ->for($turbine)
                        ->create(
                            [
                                'component_type_id' => (ComponentType::factory()->create())->id,
                            ]
                        )
                )
                ->for(GradeType::factory()->create())
                ->create();
            Component::factory(rand(1,5))
                ->for($turbine)
                ->create(
                    [
                        'component_type_id' => (ComponentType::factory()->create())->id,
                    ]
                );
        });
    }
}
