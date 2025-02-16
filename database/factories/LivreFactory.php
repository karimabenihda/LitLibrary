<?php

namespace Database\Factories;

use App\Models\Livre;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livre>
 */
class LivreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=Livre::class;
    public function definition(): array
    {
        return [
            "titre"=>$this->faker->sentence(3),
            "pages"=>$this->faker->numberBetween(10,500),
            "description"=>$this->faker->text(160),
            "image"=>$this->faker->imageUrl(),
            "category_id"=>Category::inRandomOrder()->first()->id??Category::factory(),
        ];
    }
}
