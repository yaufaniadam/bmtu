<?php

namespace Database\Seeders;

use App\Models\FinancingStatus;
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
            ->has(
                FinancingStatus::factory()
                    ->count(1)
                    ->state(function (array $attributes, MarketingReport $marketingReport) {
                        return [
                            'id_laporan_marketing' => $marketingReport->id,
                            'id_cycle' => 1,
                        ];
                    })
            )
            ->create();
    }
}
