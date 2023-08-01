<?php

namespace Database\Seeders;

use App\Models\Farm;
use App\Models\Turbine;
use Illuminate\Database\Seeder;

class TurbineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Farm::all()
            ->each(
                fn($farm) => Turbine::factory(rand(1,8))
                    ->for($farm)
                    ->create()
            );
    }
}
