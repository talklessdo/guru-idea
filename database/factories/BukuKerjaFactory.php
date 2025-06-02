<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Indikator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BukuKerja>
 */
class BukuKerjaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_guru' => 'HOLID S. AG.', // Nama guru fixed
            'judul' => $this->faker->sentence(),
            'mata_pelajaran' => $this->faker->word(),
            'semester' => $this->faker->randomElement(['Ganjil', 'Genap']),
            'slug' => $this->faker->slug(),
            'kategori' => $this->faker->randomElement(['bk1', 'bk2', 'bk3', 'bk4']),
            'status' => $this->faker->randomElement(['approve', 'pending', 'decline']),
            'kelas' => $this->faker->randomElement(['x', 'xi', 'xii']),
            'nama_file' => $this->faker->word() . '.pdf',
            'catatan' => $this->faker->text(100),
            'guru_id' => 3, // Hardcode guru_id = 3
            'indikator_id' => rand(1, 20), // Angka acak antara 1 hingga 20
        ];
    }
}
