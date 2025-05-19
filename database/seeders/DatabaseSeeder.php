<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

    }
}
