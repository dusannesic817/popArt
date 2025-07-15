<?php

namespace Database\Factories;

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
                'user_id'     => fake()->numberBetween(4, 13),
                'category_id' => fake()->numberBetween(1, 10),
                'title'       => fake()->sentence(),
                'description' => fake()->paragraph(5),
                'price'       => fake()->numberBetween(1, 1000),  
                'image'       => null,                            
                'condition'   => fake()->randomElement(['novo', 'polovno']),
                
            ];
   
    }
}
