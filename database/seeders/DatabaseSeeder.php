<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

    //    User::create([
    //     'username' => 'admin1',
    //     'email' => 'admin1@gmail.com',
    //     'password' => Hash::make('12345'), //buat password selain pake Hash::make bisa juga pake bcrypt 
    //     'nama_lengkap' => 'admin_satu',
    //     'role' => 'administrator',
    //     'verifikasi' => 'sudah',
    //     'alamat' => 'Subang'
    //    ]); 

       User::create([
        'username' => 'petugas1',
        'email' => 'petugas1@gmail.com',
        'password' => Hash::make('12345'), //buat password selain pake Hash::make bisa juga pake bcrypt 
        'nama_lengkap' => 'petugas_satu',
        'role' => 'petugas',
        'verifikasi' => 'sudah',
        'alamat' => 'Subang'
       ]); 
    }
}
