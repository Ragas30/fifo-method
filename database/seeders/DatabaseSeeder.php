<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('12345678'),
        // ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Pimpinan',
            'email' => 'pimpinan@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'pimpinan',
        ]);

        // $this->call(user::class);
        $this->call(BarangSeeder::class);
    }
}

