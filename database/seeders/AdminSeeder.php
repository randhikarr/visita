<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus admin lama kalau ada
        Admin::truncate();

        // Create Admin
        Admin::create([
            'name' => 'Admin Visita',
            'email' => 'admin@visita.com',
            'password' => Hash::make('admin123'),
        ]);

        $this->command->info('Admin berhasil dibuat!');
        $this->command->info('Email: admin@visita.com');
        $this->command->info('Password: admin123');
    }
}
