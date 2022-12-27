<?php

namespace Database\Seeders;

use App\Models\Placement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlacementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Placement::factory()->count(20)->create();
    }
}
