<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Generator;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = app(Generator::class);

        User::factory()
            ->count(1)
            ->has(
                Employee::factory()
                    ->count(1)
                    ->state(function () use ($faker) {
                        return [
                            'nama_lengkap' => 'HRD',
                            'email' => 'hrd@bmtumy.com',
                            'telepon' => $faker->phoneNumber(),
                            'nip' => $faker->creditCardNumber(),
                            'alamat' => $faker->address(),
                            'tempat_lahir' => $faker->city(),
                            'tanggal_lahir' => $faker->date(),
                        ];
                    })
            )
            ->create(
                [
                    'name' => 'HRD',
                    'email' => "hrd@bmtumy.com",
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'role' => 1,
                ]
            );
    }
}
