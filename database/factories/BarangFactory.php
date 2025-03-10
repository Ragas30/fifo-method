<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kd_barang' => $this->faker->unique()->word(),
            'nama_barang' => $this->faker->word(),
            'stok' => $this->faker->numberBetween(1, 100),
            'satuan' => $this->faker->randomElement(['pcs', 'kg']),
            'keterangan' => $this->faker->sentence(),
        ];
    }
}
