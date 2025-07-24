<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Level;
use App\Models\Question;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Str;
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
        // Jalankan RoleSeeder dulu
        $this->call([
            RoleSeeder::class,
        ]);

        // Buat user baru atau ambil yang sudah ada
        $superadmin = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'Superadmin',
                'password' => bcrypt('password')
            ]
        );

        // Assign role ke user
       if (!$superadmin->hasRole('superadmin')) {
            $superadmin->assignRole('superadmin');
        }
    }
}
