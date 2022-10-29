<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;
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
        Roles::insert([
            'name' => 'Админ',
        ]);
        Roles::insert([
            'name' => 'Студент',
        ]);
        Roles::insert([
            'name' => 'Преподаватель',
        ]);
        Roles::insert([
            'name' => 'Дежурный преподаватель',
        ]);
        User::insert([
            'name' => 'admin',
            'login' => 'admin',
            'password' => Hash::make('admin'),
            'role_id' => 1
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
