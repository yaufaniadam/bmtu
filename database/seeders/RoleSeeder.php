<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' => 'HRD'
        ]);

        DB::table('roles')->insert([
            'role' => 'Manager Marketing'
        ]);

        DB::table('roles')->insert([
            'role' => 'Pegawai Marketing'
        ]);

        DB::table('roles')->insert([
            'role' => 'Pegawai'
        ]);
    }
}
