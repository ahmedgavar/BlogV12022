<?php
declare (strict_types = 1);
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
        $title = $this->faker->words(5, true);
        return [
            'key' => Str::uuid()->toString(),
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->sentence(3, true),
            'description' => $this->faker->sentence(4, true),
            'published' => $this->faker->boolean,

            //
        ];
    }
}
