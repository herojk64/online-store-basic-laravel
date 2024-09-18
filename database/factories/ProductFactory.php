<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'slug'=>$this->faker->slug(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 10, 1000), // price between 10 and 1000
            'stock' => $this->faker->randomFloat(2, 10, 1000), // price between 10 and 1000
            'image' => '01J80DE2A2RYKWFYSBM4Z0RM7T.jpg', // Set a default image path or use a faker image
            'category_id' => Category::factory(),
        ];
    }
}
