<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mstr_cabang')->insert([
            'cabang' => 'Pusat',
            'alamat' => 'Jl. Ibu Ruswo, Kota Yogyakarta',
        ]);
        DB::table('mstr_cabang')->insert([
            'cabang' => 'Kota Yogyakarta',
            'alamat' => 'Jl. Ibu Ruswo, Kota Yogyakarta',
        ]);
        DB::table('mstr_cabang')->insert([
            'cabang' => 'Bantul',
            'alamat' => 'Universitas Muhammadiyah Yogyakarta, Jl. Brawijaya Yogyakarta',
        ]);
        
        DB::table('mstr_cabang')->insert([
            'cabang' => 'Sleman',
            'alamat' => 'Sleman, Yogyakarta',
        ]);
        
    }
}
