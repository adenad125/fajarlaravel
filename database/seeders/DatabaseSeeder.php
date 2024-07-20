<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        kelas::create([
            'nama_kelas' => 'IPS'
        ]);

        kelas::create([
            'nama_kelas' => 'MIPA'
        ]);

        kelas::factory(10)->create();


        siswa::create([
            'nisn' => 'E020322099',
            'nama' => 'Oppenheimer',
            'no_hp' => '098764',
            'alamat' => 'asbdias',
            'foto' => 'oppen.jpg',
            'kelas_id' => 1,
        ]);
        
        siswa::create([
            'nisn' => '1prhbsjd',
            'nama' => 'ajsndjk',
            'no_hp' => '98128',
            'alamat' => 'adbhadsd',
            'foto' => 'girl.jpg',
            'kelas_id' => 2,
        ]);

        siswa::factory(10)->create();

        user::create([
            'user' => 'E020322099',
            'password' => bcrypt('E020322099'),
            'role' => 'siswa'
        ]);
        user::create([
            'user' => 'E020322100',
            'password' => bcrypt('E020322100'),
            'role' => 'siswa'
        ]);
        user::create([
            'user' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 'siswa'
        ]);
    }
}
