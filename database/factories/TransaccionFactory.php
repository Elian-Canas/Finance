<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaccion>
 */
class TransaccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'monto' => $this->faker->randomNumber(8, true),
            'categoria_id' => $this->faker->randomNumber(3, false),
            'user_id' => 1,
            'fecha' => $this->faker->date('Y_m_d'),
            'tipo' => $this->faker->numberBetween(1,2),
            'descripcion' => $this->faker->sentence()

        ];
    }
}
