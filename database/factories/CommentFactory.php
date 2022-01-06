<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => $this->faker->numberBetween(1, 10),
            'parent_id' => $this->faker->randomElement([null, Comment::all()->random()->id]),
            'name' => $this->faker->name,
            'body' => $this->faker->sentence,
        ];
    }
}
