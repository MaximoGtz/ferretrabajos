<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trabajadore>
 */
class TrabajadoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
            'apellido' => $this->faker->word(),
            'correo' => $this->faker->word(),
            'contrasena' => $this->faker->word(),
            'rfc' => $this->faker->word(),
            'especialidad' => $this->faker->word(),
            'imagen' => $this->faker->word(),

        ];
    }
}
