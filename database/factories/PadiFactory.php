<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Padi>
 */
class PadiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_padi' => $this->faker->word(),
            'warna' => $this->faker->randomElement(['Putih', 'Merah', 'Kuning']),
            'bentuk' => $this->faker->randomElement(['Lonjong', 'Bulat', 'Panjang']),
            'tekstur' => $this->faker->randomElement(['Lembut', 'Kasar', 'Sedang']),
            'harga' => $this->faker->numberBetween(8000, 15000),
            'gambar' => 'public/assets/images/logos/about.jpeg',
        ];
    }
}
