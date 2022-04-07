<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Suggestions>
 */
class SuggestionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'suggestion' => $this->faker->text(100),
            'customer_id' => rand(1, 10),
            'created_by' => 1,
        ];
    }
}
