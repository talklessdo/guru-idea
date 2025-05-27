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
                'nama_indikator' => 'capaian_pembelajaran',
                'kategori' => '1'    
            ],
            [
                'nama_indikator' => 'analisis_tujuan_pembelajaran',
                'kategori' => '1'    
            ],
            [
                'nama_indikator' => 'modul_ajar',
                'kategori' => '1'    
            ],
            [
                'nama_indikator' => 'modul_proyek_p5',
                'kategori' => '1'    
            ],
            [
                'nama_indikator' => 'kkpt',
                'kategori' => '1'    
            ],
            [
                'nama_indikator' => 'program_remedial_pengayaan',
                'kategori' => '1'    
            ],
            [
                'nama_indikator' => 'kode_etik_guru',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'ikrar_guru',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'tata_tertib',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'pembiasaan_guru',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'kalender_pendidikan',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'analisis_alokasi_waktu',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'prota',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'promes',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'jurnal_agenda',
                'kategori' => '2'
            ],
            [
                'nama_indikator' => 'daftar_hadir_siswa',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'daftar_nilai',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'penilaian_sikap',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'analisis_hasil_penilaian',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'daftar_buku_pegangan',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'jadwal_mengajar',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'daya_serap_siswa',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'kisi_kisi_soal',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'kumpulan_soal',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'analisis_butir_soal',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'perbaikan_soal',
                'kategori' => '3'
            ],
            [
                'nama_indikator' => 'refleksi_kinerja',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'tindak_lanjut_kinerja',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'sop_modul_ajar',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'analisis_cp',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'analisis_materi',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'analisis_model_pembelajaran',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'sop_modul_proyek',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'analisis_proyek',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'analisis_dimensi_pancasila',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'analisis_model_pembelajaran_proyek',
                'kategori' => '4'
            ],
            [
                'nama_indikator' => 'analisis_asesmen_proyek',
                'kategori' => '4'
            ],
        ]);


    }
}
