<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FinancingPartner>
 */
class FinancingPartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_pegawai' => Employee::inRandomOrder()->first()->id,
            'nama_lengkap' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'kabupaten' => $this->faker->city(),
            'telepon' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'pekerjaan' => $this->faker->jobTitle(),
            'pendidikan_terakhir' => $this->faker->word(),
        ];
    }
}
