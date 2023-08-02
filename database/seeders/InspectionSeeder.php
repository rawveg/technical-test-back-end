<?php

namespace Database\Seeders;

use App\Models\Inspection;
use App\Models\Turbine;
use Illuminate\Database\Seeder;

class InspectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Turbine::all()
            ->each(
                fn($turbine) => Inspection::factory(rand(1, 4))
                    ->for($turbine)
                    ->create()
            );
    }
}
