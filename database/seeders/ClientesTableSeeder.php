<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'correo' => 'maximo@cliente.com',
            'contrasena' => Hash::make('contrasena123'), // Asegúrate de hashear la contraseña
            'imagen' => 'https://rickandmortyapi.com/api/character/avatar/14.jpeg',
        ]);

        Cliente::create([
            'nombre' => 'María',
            'apellido' => 'González',
            'correo' => 'maria.gonzalez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'imagen' => 'https://rickandmortyapi.com/api/character/avatar/15.jpeg',
        ]);

        Cliente::create([
            'nombre' => 'Carlos',
            'apellido' => 'López',
            'correo' => 'carlos.lopez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'imagen' => 'https://rickandmortyapi.com/api/character/avatar/16.jpeg',
        ]);

        Cliente::create([
            'nombre' => 'Ana',
            'apellido' => 'Hernández',
            'correo' => 'ana.hernandez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'imagen' => 'https://rickandmortyapi.com/api/character/avatar/17.jpeg',
        ]);

        Cliente::create([
            'nombre' => 'Luis',
            'apellido' => 'Martínez',
            'correo' => 'luis.martinez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'imagen' => 'https://rickandmortyapi.com/api/character/avatar/18.jpeg',
        ]);

        Cliente::create([
            'nombre' => 'Sofía',
            'apellido' => 'Ramírez',
            'correo' => 'sofia.ramirez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'imagen' => 'https://rickandmortyapi.com/api/character/avatar/19.jpeg',
        ]);

        Cliente::create([
            'nombre' => 'Diego',
            'apellido' => 'Torres',
            'correo' => 'diego.torres@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'imagen' => 'https://rickandmortyapi.com/api/character/avatar/20.jpeg',
        ]);

        Cliente::create([
            'nombre' => 'Valeria',
            'apellido' => 'Sánchez',
            'correo' => 'valeria.sanchez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'imagen' => 'https://rickandmortyapi.com/api/character/avatar/140.jpeg',
        ]);
    }
}
