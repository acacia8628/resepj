<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Shop;

class ReserveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reserve_date' => Carbon::tomorrow(),
            'reserve_time' => '17:00:00',
            'reserve_number' => $this->faker->randomNumber(1),
        ];
    }
}
