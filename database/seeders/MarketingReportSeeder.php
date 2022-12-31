<?php

namespace Database\Seeders;

use App\Models\MarketingReport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketingReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MarketingReport::factory()
            ->count(20)
            ->create();
    }
}
