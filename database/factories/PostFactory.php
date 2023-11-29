<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Post>
 */
class PostFactory extends Factory
{
    protected  $model = Post::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->name,
            'content' => $this->faker->text,
            'image' => $this->faker->imageUrl(),
            'like' => random_int(1, 100),
            'is_published' => 1,
            'category_id' => Category::get()->random()->id
        ];
    }
}
