<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->word;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->sentence,
            'meta_description' => $this->faker->word,
            'price' => rand(100, 1000),
            'is_popular' => rand(0, 1),
            'is_hero' => rand(0, 1),
            'views' => rand(0, 100)
        ];
    }
}
