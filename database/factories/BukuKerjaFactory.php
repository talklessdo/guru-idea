<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Indikator;
use App\Models\User;
use Illuminate\Support\Arr;

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
        // Ambil id user yang benar-benar ada dan role guru, kecuali id 1, 8, 11
        $guruIds = User::where('role', 'guru')->whereNotIn('id', [1, 8, 11])->pluck('id')->toArray();
        $guruId = !empty($guruIds) ? $this->faker->randomElement($guruIds) : null;
        $indikatorId = rand(1, 29);
        $kategoriKode = Indikator::find($indikatorId)?->kategori;

        $status = $this->faker->randomElement(['approve', 'pending', 'decline']);

        return [
            'nama_guru' => $guruId ? User::find($guruId)?->name ?? 'N/A' : 'N/A',
            'judul' => $this->faker->sentence(),
            'mata_pelajaran' => $this->faker->randomElement([
                'Bahasa Indonesia',
                'Bahasa Inggris',
                'Matematika',
                'Matematika Tingkat Lanjut',
                'Fisika',
                'Kimia',
                'Biologi',
                'Ekonomi',
                'Akidah Akhlak',
                'Fiqih',
                "Al-Qur'an Hadits",
                'Bahasa Arab',
                'Penjaskes',
                'Informatika',
                'Seni Budaya',
                'Sejarah Kebudayaan Islam',
                'Sejarah Indonesia',
                'Pendidikan Pancasila',
                'Prakarya',
                'Bahasa Sunda',
            ]),

            'semester' => $this->faker->randomElement(['Ganjil', 'Genap']),
            'tp' => $this->faker->randomElement(['2024/2025', '2025/2026', '2026/2027', '2027/2028']),
            'slug' => $this->faker->slug(),
            // 'kategori' => $this->faker->randomElement(['bk1', 'bk2', 'bk3', 'bk4']),
            'kategori' => match ($kategoriKode) {
                '1' => 'bk1',
                '2' => 'bk2',
                '3' => 'bk3',
                '4' => 'bk4',
                default => 'n/a',
            },
            'status' => $status,
            'kelas' => $this->faker->randomElement(['x', 'xi', 'xii']),
            // 'nama_file' => $this->faker->word() . '.pdf',
            'nama_file' => 'uts-inggris-m-isa-daud-202222011.pdf',
            'catatan' => $status === 'pending' ? null : $this->faker->text(100),
            'guru_id' => $guruId, 
            'indikator_id' => $indikatorId,
            'created_at' => $this->faker->dateTimeBetween('2024-01-01', now()),
        ];
    }
}

// jalankan dengan php artisan tinker
// App\Models\BukuKerja::factory()->count(4)->create();
