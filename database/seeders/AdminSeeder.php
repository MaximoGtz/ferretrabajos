<?php

namespace Database\Seeders;

// importacio de modelo de jair
use App\Models\administradore as ModelsAdministradore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsAdministradore::factory(1)->create();
    }
}
