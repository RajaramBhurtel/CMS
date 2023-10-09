<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Booking::factory(10)->create();
        // \App\Models\Shipper::factory(10)->create();
        // \App\Models\Consignee::factory(10)->create();
        // \App\Models\Merchandise::factory(10)->create();
    }
}
