<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mstr_cycle')->insert([
            'cycle' => 'Survey'
        ]);
        DB::table('mstr_cycle')->insert([
            'cycle' => 'Dokumen'
        ]);
        DB::table('mstr_cycle')->insert([
            'cycle' => 'Komite'
        ]);
        DB::table('mstr_cycle')->insert([
            'cycle' => 'Pembelian'
        ]);
        DB::table('mstr_cycle')->insert([
            'cycle' => 'Akad'
        ]);
    }
}
