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
            'correo' => 'juan.perez@example.com',
            'contrasena' => Hash::make('contrasena123'), // Asegúrate de hashear la contraseña
            'imagen' => 'ruta/a/la/imagen1.jpg',
        ]);

        Cliente::create([
            'nombre' => 'María',
            'apellido' => 'González',
            'correo' => 'maria.gonzalez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'imagen' => 'ruta/a/la/imagen2.jpg',
        ]);

        Cliente::create([
            'nombre' => 'Carlos',
            'apellido' => 'López',
            'correo' => 'carlos.lopez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'imagen' => 'ruta/a/la/imagen3.jpg',
        ]);

        Cliente::create([
            'nombre' => 'Ana',
            'apellido' => 'Hernández',
            'correo' => 'ana.hernandez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'imagen' => 'ruta/a/la/imagen4.jpg',
        ]);

        Cliente::create([
            'nombre' => 'Luis',
            'apellido' => 'Martínez',
            'correo' => 'luis.martinez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'imagen' => 'ruta/a/la/imagen5.jpg',
        ]);

        Cliente::create([
            'nombre' => 'Sofía',
            'apellido' => 'Ramírez',
            'correo' => 'sofia.ramirez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'imagen' => 'ruta/a/la/imagen6.jpg',
        ]);

        Cliente::create([
            'nombre' => 'Diego',
            'apellido' => 'Torres',
            'correo' => 'diego.torres@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'imagen' => 'ruta/a/la/imagen7.jpg',
        ]);

        Cliente::create([
            'nombre' => 'Valeria',
            'apellido' => 'Sánchez',
            'correo' => 'valeria.sanchez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'imagen' => 'ruta/a/la/imagen8.jpg',
        ]);
    }
}
