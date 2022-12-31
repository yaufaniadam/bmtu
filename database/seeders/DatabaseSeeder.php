<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $this->call(
            [
                RoleSeeder::class,
                PositionSeeder::class,
                BranchSeeder::class,
                AdminSeeder::class,
                UserSeeder::class,
                PartnerSeeder::class,
                MarketingReportSeeder::class
            ]
        );
    }
}
