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
            'name' => $this->faker->word . '商品',
            'price' => $this->faker->numberBetween(100, 10000),
            'image_path' => 'sample.jpg', // 仮の画像（storageにサンプル画像入れておくとよい）
            'stock' => $this->faker->numberBetween(0, 50),
            'category_id' => 1, // 仮にカテゴリ1番があるとする（なければSeederで追加）
        ];
    }
}
