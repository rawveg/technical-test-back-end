<?php

namespace Database\Seeders;

use App\Models\GradeType;
use Illuminate\Database\Seeder;

class GradeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GradeType::factory(10)->create();
    }
}
