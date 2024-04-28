<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

use Illuminate\Support\Str;

class PostFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $title = $this->faker->words(4, true);

        return [
            'user_id' => $this->faker->numberBetween(1, 3),
            'title' => ucfirst($title),
            'text' => $this->faker->paragraph(3, true),
            'slug' => Str::slug($title),
        ];
    }
}
