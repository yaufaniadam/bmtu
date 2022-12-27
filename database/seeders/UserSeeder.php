<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()
        //     ->has(Employee::factory()->count(1))
        //     ->count(1)
        //     ->create();

        User::factory()
            ->has(Employee::factory()->count(1))
            ->count(2000)
            ->create();
    }
}
