<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mstr_posisi')->insert([
            'posisi' => 'HRD',
            'created_at' => now(),
        ]);

        DB::table('mstr_posisi')->insert([
            'posisi' => 'Marketing',
            'created_at' => now(),
        ]);

        DB::table('mstr_posisi')->insert([
            'posisi' => 'Teller',
            'created_at' => now(),
        ]);
    }
}
