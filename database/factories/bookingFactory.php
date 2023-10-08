<?php

namespace Database\Factories;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\booking>
 */
class bookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public int $counter = 40000015;
    public function definition(): array
    {
       
        $this->counter++;
    return [
        'cn_no' => (string) $this->counter, // Generate a unique CN number (UUID)
        'date' => $this->faker->date,
        'category' => $this->faker->randomElement(['domestic', 'international']),
        'payment_mode' => $this->faker->randomElement(['Cash', 'Credit']),
        'one_time_shipper' => $this->faker->name,
        'shipper_number' => $this->faker->phoneNumber,
        'shipper_address1' => $this->faker->streetAddress,
        'shipper_address2' => $this->faker->secondaryAddress,
        'shipper_longitude' => $this->faker->longitude,
        'shipper_latitude' => $this->faker->latitude,
        'one_time_consignee' => $this->faker->name,
        'consignee_number' => $this->faker->phoneNumber,
        'consignee_address1' => $this->faker->streetAddress,
        'consignee_address2' => $this->faker->secondaryAddress,
        'consignee_longitude' => $this->faker->longitude,
        'consignee_latitude' => $this->faker->latitude,
        'content_type' => $this->faker->randomElement(['doc', 'non_doc']),
        'merchandise_code' => $this->faker->ean8,
        'mode' => $this->faker->randomElement(['surface', 'by_air']),
        'quantity' => $this->faker->numberBetween(1, 100),
        'weight' => $this->faker->numberBetween(1, 1000),
        'individual_price' => $this->faker->randomFloat(2, 10, 1000),
        'price_before_discount' => $this->faker->randomFloat(2, 10, 1000),
        'discount' => $this->faker->randomFloat(2, 0, 200),
        'price_after_discount' => $this->faker->randomFloat(2, 10, 1000),
        'biller' => $this->faker->name,
        'description' => $this->faker->text,
        // 'menifests_code' => $this->faker->ean8,
        // 'delivery_code' => $this->faker->ean8,
        'status' => $this->faker->randomElement(['booked']),
    ];

    }
}
