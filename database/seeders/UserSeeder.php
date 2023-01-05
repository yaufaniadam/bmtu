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
        User::factory()
            ->has(
                Employee::factory()
                    ->count(1)
                    ->state(function (array $attributes, User $user) {
                        return ['email' => $user['email']];
                    })
            )
            ->count(1)
            ->create();
    }
}
