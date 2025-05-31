<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        collect([
            [
                'name' => 'GUNTUR NURROHMAN S.Kom, ',
                'email' => 'gunturnurrohman2021@gmail.com',
                'password' => bcrypt('guntur123'),
                'role'=> 'kurikulum',
            ],
            [
                'name' => 'MUHAMMAD ALWI S. PD. I.',
                'email' => 'betawicondet567@gmail.com',
                'password' => bcrypt('alwi123'),
            ],
            [
                'name' => 'HOLID S. AG.',
                'email' => 'cangole45@gmail.com',
                'password' => bcrypt('holid123'),
            ],
            [
                'name' => 'ADI NUGROHO S. PD. SI.',
                'email' => 'adida2107@gmail.com',
                'password' => bcrypt('adi123'),
            ],
            [
                'name' => 'AHMAD RIPAI',
                'email' => 'ahmadrifai6807@gmail.com',
                'password' => bcrypt('ripai123'),
            ],
            [
                'name' => 'NADA AMELIA S. S.',
                'email' => 'nadamelia82@gmai.com',
                'password' => bcrypt('nada123'),
            ],
            [
                'name' => 'NURHASANAH S. PD.',
                'email' => 'nurhasnah070707@gmail.com',
                'password' => bcrypt('nurhasanah123'),
            ],
            [
                'name' => 'MUHAMMAD AMIN TAHMID S.AG., M.M.',
                'email' => 'amintahmid.007@gmail.com',
                'password' => bcrypt('amin123'),
                'role' => 'kepsek'
            ],
            [
                'name' => 'Eliza Tiara Dwiyanti',
                'email' => 'arwamohamadtaufik@gmail.com',
                'password' => bcrypt('eliza123'),
            ],
            [
                'name' => 'MUHAMAD WAHYU RIDLO',
                'email' => 'wahyurido07@gmail.com',
                'password' => bcrypt('wahyu123'),
            ],
            [
                'name' => 'Ibrahim Umar',
                'email' => 'baimwungunbelen@gmail.com',
                'password' => bcrypt('ibrahim123'),
            ],
            [
                'name' => 'SADARMAN',
                'email' => 'wisatadarman@gmail.com',
                'password' => bcrypt('sadarman123'),
            ],
            [
                'name' => 'Rosmawati M',
                'email' => 'biapunya2021@gmail.com',
                'password' => bcrypt('rosmawati123'),
            ],
        ])->each(fn ($data) => User::factory()->create($data));

        DB::table('indikator')->insert([
            [
                'nama_indikator' => 'Capaian Pembelajaran',
                'kategori' => '1'    
            ],
            [
                'nama_indikator' => 'Analisis Tujuan Pembelajaran',
                'kategori' => '1'    
            ],
            [
                'nama_indikator' => 'Modul Ajar',
                'kategori' => '1'    
            ],
            [
                'nama_indikator' => 'Modul Proyek P5',
                'kategori' => '1'    
            ],
            [
                'nama_indikator' => 'Kriteria Ketercapaian Tujuan Pembelajaran',
                'kategori' => '1'    
            ],
            [
                'nama_indikator' => 'Program Remedial Pengayaan',
                'kategori' => '1'    
            ],
            [
                'nama_indikator' => 'Kode Etik Guru',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'Ikrar Guru',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'Tata Tertib',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'Pembiasaan Guru',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'Kalender Pendidikan',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'Analisis Alokasi Waktu',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'Prota',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'Promes',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'Jurnal Agenda',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'Daftar Hadir Siswa',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'Daftar Nilai',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'Penilaian Sikap',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'Analisis Hasil Penilaian',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'Daftar Buku Pegangan',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'Jadwal Mengajar',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'Daya Serap Siswa',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'Kisi Kisi Soal',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'Kumpulan Soal',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'Analisis Butir Soal',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'Perbaikan Soal',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'Refleksi Kinerja',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'Tindak Lanjut Kinerja',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'Sop Modul Ajar',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'Analisis Cp',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'Analisis Materi',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'Analisis Model Pembelajaran',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'Sop Modul Proyek',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'Analisis Proyek',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'Analisis Dimensi Pancasila',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'Analisis Model Pembelajaran Proyek',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'Analisis Asesmen Proyek',
                'kategori' => '4'
            ],
        ]);


    }
}
