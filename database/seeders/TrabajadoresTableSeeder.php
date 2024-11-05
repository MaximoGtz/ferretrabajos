<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trabajadore;
use Illuminate\Support\Facades\Hash;
class TrabajadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trabajadore::create([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'correo' => 'juan.perez@example.com',
            'contrasena' => Hash::make('contrasena123'), // Asegúrate de hashear la contraseña
            'rfc' => 'PEPJ800101XYZ',
            'especialidad' => 'Programador',
            'imagen' => 'ruta/a/la/imagen1.jpg',
        ]);

        Trabajadore::create([
            'nombre' => 'María',
            'apellido' => 'González',
            'correo' => 'maria.gonzalez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'rfc' => 'GONM900202XYZ',
            'especialidad' => 'Diseñadora',
            'imagen' => 'ruta/a/la/imagen2.jpg',
        ]);

        Trabajadore::create([
            'nombre' => 'Carlos',
            'apellido' => 'López',
            'correo' => 'carlos.lopez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'rfc' => 'LOPC900303XYZ',
            'especialidad' => 'Analista',
            'imagen' => 'ruta/a/la/imagen3.jpg',
        ]);

        Trabajadore::create([
            'nombre' => 'Ana',
            'apellido' => 'Hernández',
            'correo' => 'ana.hernandez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'rfc' => 'HEAA900404XYZ',
            'especialidad' => 'Gerente',
            'imagen' => 'ruta/a/la/imagen4.jpg',
        ]);

        Trabajadore::create([
            'nombre' => 'Luis',
            'apellido' => 'Martínez',
            'correo' => 'luis.martinez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'rfc' => 'MALU900505XYZ',
            'especialidad' => 'Soporte Técnico',
            'imagen' => 'ruta/a/la/imagen5.jpg',
        ]);

        Trabajadore::create([
            'nombre' => 'Sofía',
            'apellido' => 'Ramírez',
            'correo' => 'sofia.ramirez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'rfc' => 'RASO900606XYZ',
            'especialidad' => 'Marketing',
            'imagen' => 'ruta/a/la/imagen6.jpg',
        ]);

        Trabajadore::create([
            'nombre' => 'Diego',
            'apellido' => 'Torres',
            'correo' => 'diego.torres@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'rfc' => 'TODI900707XYZ',
            'especialidad' => 'Ventas',
            'imagen' => 'ruta/a/la/imagen7.jpg',
        ]);

        Trabajadore::create([
            'nombre' => 'Valeria',
            'apellido' => 'Sánchez',
            'correo' => 'valeria.sanchez@example.com',
            'contrasena' => Hash::make('contrasena123'),
            'rfc' => 'SACV900808XYZ',
            'especialidad' => 'Recursos Humanos',
            'imagen' => 'ruta/a/la/imagen8.jpg',
        ]);
    }
}
