<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\administradore>
 */
class administradoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //return [
            'nombre' => 'admin',
            'apellido' => '',
            'usuario' => 'admin@gmail.com',
            'rol' => 'superadmin',
            'imagen' => 'imagen',
            'estado' => 'activo',
            // 'email_verified_at' => now(),
            'contrasena' => Hash::make('123456789'),
            'remember_token' => Str::random(10),
        ];
    }
}
