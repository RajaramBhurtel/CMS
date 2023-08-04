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
            $table->string('cn_no')->unique();
            $table->date('date');
            $table->enum('category', ['domestic', 'international']);
            $table->enum('payment_mode', ['Cash', 'Credit']);
            $table->string('shipper_id')->nullable();
            $table->string('one_time_shipper')->nullable();
            $table->string('shipper_number');
            $table->string('shipper_address1');
            $table->string('shipper_address2');
            $table->string('shipper_longitude');
            $table->string('shipper_latitude');
            $table->string('consignee_id')->nullable();
            $table->string('one_time_consignee')->nullable();
            $table->string('consignee_number');
            $table->string('consignee_address1');
            $table->string('consignee_address2');
            $table->string('consignee_longitude');
            $table->string('consignee_latitude');
            $table->enum('content_type', ['doc', 'non_doc']);
            $table->string('merchandise_code');
            $table->enum('mode', ['surface', 'by_air']);
            $table->integer('quantity');
            $table->integer('weight');
            $table->decimal('individual_price', 8, 2);
            $table->decimal('price_before_discount', 12, 2);
            $table->decimal('discount', 8, 2);
            $table->decimal('price_after_discount', 12, 2);
            $table->string('biller');
            $table->text('description')->nullable();
            $table->string('menifests_code')->nullable();
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
