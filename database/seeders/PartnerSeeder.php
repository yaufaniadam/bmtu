<?php

namespace Database\Seeders;

use App\Models\FinancingPartner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FinancingPartner::factory()
            ->count(15)
            ->create();
    }
}
