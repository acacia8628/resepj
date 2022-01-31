<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Area;
use App\Models\Genre;

class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'area_id' => Area::factory(),
            'genre_id' => Genre::factory(),
            'name' => $this->faker->name(),
            'overview' => Str::random(20),
            'img_path' => Str::random(20),
        ];
    }
}
