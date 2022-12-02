<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

            $a = [Image::class, Post::class];
            $s = rand(0,1);

        return [
            'body' => fake()->text,
            'commentable_id' => rand(1,5),
            'commentable_type' => $a[$s],
            'user_id' => rand(1,5)
            //id	body	commentable_id	commentable_type	user_id
        ];
    }
}
