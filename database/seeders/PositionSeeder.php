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
            'posisi' => 'General Manager',
            'created_at' => now(),
        ]);

        DB::table('mstr_posisi')->insert([
            'posisi' => 'Manager Bisnis',
            'created_at' => now(),
        ]);

        DB::table('mstr_posisi')->insert([
            'posisi' => 'Manager Operasional',
            'created_at' => now(),
        ]);
        DB::table('mstr_posisi')->insert([
            'posisi' => 'Manager HRD',
            'created_at' => now(),
        ]);
        DB::table('mstr_posisi')->insert([
            'posisi' => 'Supervisor',
            'created_at' => now(),
        ]);
        DB::table('mstr_posisi')->insert([
            'posisi' => 'Kabag Operasional',
            'created_at' => now(),
        ]);
        DB::table('mstr_posisi')->insert([
            'posisi' => 'Admin Operasional',
            'created_at' => now(),
        ]);
        DB::table('mstr_posisi')->insert([
            'posisi' => 'Teller',
            'created_at' => now(),
        ]);
        DB::table('mstr_posisi')->insert([
            'posisi' => 'Customer Service',
            'created_at' => now(),
        ]);
        DB::table('mstr_posisi')->insert([
            'posisi' => 'Admin Pembiayaan',
            'created_at' => now(),
        ]);
        DB::table('mstr_posisi')->insert([
            'posisi' => 'Akunting Pusat',
            'created_at' => now(),
        ]);
        DB::table('mstr_posisi')->insert([
            'posisi' => 'Akunting Cabang',
            'created_at' => now(),
        ]);
        DB::table('mstr_posisi')->insert([
            'posisi' => 'Coorporate Comunication',
            'created_at' => now(),
        ]);
        DB::table('mstr_posisi')->insert([
            'posisi' => 'Maal',
            'created_at' => now(),
        ]);
        DB::table('mstr_posisi')->insert([
            'posisi' => 'IT',
            'created_at' => now(),
        ]);
        DB::table('mstr_posisi')->insert([
            'posisi' => 'Marketing',
            'created_at' => now(),
        ]);
        DB::table('mstr_posisi')->insert([
            'posisi' => 'Cleaning Service',
            'created_at' => now(),
        ]);
        DB::table('mstr_posisi')->insert([
            'posisi' => 'Satpam',
            'created_at' => now(),
        ]);
    }
}
