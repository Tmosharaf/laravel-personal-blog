<?php

namespace Database\Factories;

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
        return [
            //name	email	comment	post_id	
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'comment' => $this->faker->paragraph,
            'post_id' => Post::all()->random()->id,
        ];
    }
}
