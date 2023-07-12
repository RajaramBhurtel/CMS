<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consignee>
 */
class ConsigneeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'consignee_id' => $this->faker->unique()->uuid(),
            'name' => $this->faker->name(),
            'consignee_address_1' => $this->faker->streetAddress(),
            'consignee_address_2' => $this->faker->secondaryAddress(),
            'consignee_latitude' => $this->faker->latitude(),
            'consignee_longitude' => $this->faker->longitude(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
        ];
    }
}
