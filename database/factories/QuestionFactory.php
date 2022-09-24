<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(10);
        return [
            'title' => Str::ucfirst($title),
            'slug' => Str::slug($title),
            'body' => Str::ucfirst($this->faker->text()),
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
        ];
    }
}
