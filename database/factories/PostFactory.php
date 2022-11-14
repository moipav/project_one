<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            //
            'title' => fake()->text(30),
            'slug' => fake()->slug,
            'content' => fake()->text,
            'date' => now(),
            'status' => rand(0,1),
            'user_id' => rand(1, 50),

        ];
    }
}
