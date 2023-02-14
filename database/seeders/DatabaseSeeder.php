<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Petugas::create([
            'nama_petugas' => 'admin',
            'username' => 'admin',
            'password' => password_hash('admin',PASSWORD_DEFAULT),
            'verification' => "Y",
            'no_telp' => '088223837165',
            'level' => 'admin',
        ]);
        
        \App\Models\Petugas::create([
            'nama_petugas' => 'Petugas',
            'username' => 'petugas',
            'password' => password_hash('petugas',PASSWORD_DEFAULT),
            'verification' => "Y",
            'no_telp' => '088223837165',
            'level' => 'petugas',
        ]);
    }
}
