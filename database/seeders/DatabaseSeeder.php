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
        // \App\Models\Trabajadore::factory(5)->create();
        // $this->call([
        //     AdminSeeder::class
        // ]);
        $this->call([
            AdministradoresTableSeeder::class
        ]);
        $this->call([
            ClientesTableSeeder::class
        ]);
        $this->call([
            TrabajadoresTableSeeder::class
        ]);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
