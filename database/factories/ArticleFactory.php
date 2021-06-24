<?php

namespace Database\Factories;

use App\Article;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'excerpt' => $this->faker->sentence(),
            'text' => $this->faker->paragraph(),
            'user_id' => User::factory(),
        ];
    }
}
