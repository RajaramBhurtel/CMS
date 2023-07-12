<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shipper>
 */
class ShipperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'shipper_id' => $this->faker->unique()->uuid(),
            'name' => $this->faker->name(),
            'shipper_address_1' => $this->faker->streetAddress(),
            'shipper_address_2' => $this->faker->secondaryAddress(),
            'shipper_latitude' => $this->faker->latitude(),
            'shipper_longitude' => $this->faker->longitude(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
        ];
    }
}
