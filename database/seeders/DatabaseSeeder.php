<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Level;
use App\Models\Question;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user baru atau ambil yang sudah ada
    $admin = User::firstOrCreate(
        ['email' => 'admin@example.com'],
        [
            'name' => 'Admin',
            'password' => bcrypt('password') // pastikan pakai hash
        ]
    );

    // Assign role ke user (role-nya sudah ada di tabel `roles`)
        $admin->assignRole('admin');
}
}
