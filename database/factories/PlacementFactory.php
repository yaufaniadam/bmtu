<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Employee;
use App\Models\EmployeeStatus;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Placement>
 */
class PlacementFactory extends Factory
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
            'id_cabang' => Branch::inRandomOrder()->first()->id,
            'id_posisi' => Position::inRandomOrder()->first()->id,
            'tanggal_mulai' => $this->faker->date(),
            'tanggal_selesai' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'file_sk' => '',
            'status_penempatan' => ''
        ];
    }
}
