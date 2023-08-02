<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FarmSeeder::class);
        $this->call(TurbineSeeder::class);
        $this->call(ComponentTypeSeeder::class);
        $this->call(ComponentSeeder::class);
        $this->call(GradeTypeSeeder::class);
    }
}
