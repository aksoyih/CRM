<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UpdatesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'update_type' => $this->faker->randomElement(['started', 'completed', 'cancelled']),
            'update' => $this->faker->text,
            'subject_id' => $this->faker->numberBetween(1, 10),
            'subject_type' => $this->faker->randomElement(['complaint', 'suggestion']),
            'created_by' => 1,
        ];
    }
}
