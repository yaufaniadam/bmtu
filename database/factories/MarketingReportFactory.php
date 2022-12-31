<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\FinancingPartner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MarketingReport>
 */
class MarketingReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_mitra_pembiayaan' => FinancingPartner::inRandomOrder()->first()->id,
            'id_pegawai' => Employee::inRandomOrder()->first()->id,
            'jenis_pembiayaan' => $this->faker->word(),
            'keterangan' => $this->faker->paragraph(),
            'tanggal' => $this->faker->date()
        ];
    }
}
