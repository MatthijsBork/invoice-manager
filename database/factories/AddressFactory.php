<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'street' => $this->faker->streetname(),
            'house_number' => $this->faker->numberBetween(1, 200),
            'house_number_suffix' => null,
            'zip_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'user_id' => null,
        ];
    }
}
