<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('cn_no');
            $table->date('date');
            $table->string('category');
            $table->enum('payment_mode', ['cash', 'credit']);
            $table->string('shipper');
            $table->string('shipper_number');
            $table->string('shipper_city');
            $table->string('shipper_location');
            $table->string('consignee_name');
            $table->string('consignee_number');
            $table->string('consignee_city');
            $table->string('consignee_location');
            $table->string('content_type');
            $table->string('merchandise_type');
            $table->string('mode');
            $table->integer('quantity');
            $table->integer('weight');
            $table->decimal('individual_price', 8, 2);
            $table->decimal('price_before_discount', 8, 2);
            $table->decimal('discount', 8, 2);
            $table->decimal('price_after_discount', 8, 2);
            $table->string('biller');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
