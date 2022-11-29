<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->timestampTz('booking_day_start')->nullable();
            $table->timestampTz('booking_day_end')->nullable();
            $table->timestampTz('booking_time_start')->nullable();
            $table->timestampTz('booking_time_end')->nullable();
            $table->integer('attendant');
            $table->string('room_id')->nullable();
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreignId('order_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
