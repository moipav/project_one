<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
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
        $title = fake()->text(30);
        $slug =  Str::of($title)->slug('-');

        return [
            //
            'title' => $title,
            'slug' => $slug,
            'content' => fake()->text,
            'date' => now(),
            'status' => rand(0,1),
            'user_id' => rand(1, 50),

        ];
    }
}
