<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_lengkap' => 'Admin',
            'email' => 'admin@admin.com',
            'telepon' => $this->faker->phoneNumber(),
            'nip' => $this->faker->creditCardNumber(),
            'alamat' => $this->faker->address(),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date(),
        ];
    }
}
