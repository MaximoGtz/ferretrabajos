<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AdministradoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('administradores')->insert(
            [
                'nombre' => 'superadmin',
                'apellido' => 'test',
                'email' => 'superadmin@ferretrabajos.com',
                'usuario' => 'superadmin',
                'contrasena' => Hash::make('123456789'), // Hasheamos la contraseña
                'rol' => 'superadmin',
                'estado' => 'Activo',
                'imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'remember_token' => null,
            ],
        );
        DB::table('administradores')->insert(
            [
                'nombre' => 'admin',
                'apellido' => 'test2',
                'email' => 'admin@ferretrabajos.com',
                'usuario' => 'admin',
                'contrasena' => Hash::make('123456789'), // Hasheamos la contraseña
                'rol' => 'admin',
                'estado' => 'Activo',
                'imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'remember_token' => null,
            ],
        );
    }
}
