<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'post_id' => Post::inRandomOrder()->first()?->id ?? 1,
            'name' => $this->faker->name(),
            'comment' => $this->faker->sentence(10),
        ];
    }
} 