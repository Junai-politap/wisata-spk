<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PenggunaSeeder extends Seeder
{
    public function run(): void
    {
        $pengguna = [];

        // Kita buat 1 Admin dan 99 User biasa
        for ($i = 1; $i <= 100; $i++) {
            $role = ($i === 1) ? 'admin' : 'user'; // ID 1 jadi admin

            $pengguna[] = [
                'id' => Str::uuid()->toString(), // Menggunakan UUID seperti tabel packages
                'nama_pengguna' => $role === 'admin' ? 'Administrator Utama' : 'Pengguna_'.$i,
                'email' => $role === 'admin' ? 'admin@wisatatopsis.com' : 'user'.$i.'@example.com',
                'password' => Hash::make('12345'), // Password "12345" yang sudah di-bcrypt
                'alamat' => 'Jl. Contoh No. '.$i.', Kota Wisata',
                'no_telp' => '0812'.str_pad($i, 7, '0', STR_PAD_LEFT),
                'poto' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('pengguna')->insert($pengguna);
    }
}
