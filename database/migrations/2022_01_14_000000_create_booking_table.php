<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
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
            $table->string('animal_type');
            $table->string('breed')->nullable();
            $table->boolean('is_mixed')->nullable();
            $table->string('animal_age')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('customer_surname')->nullable();
            $table->string('email')->nullable();
            $table->boolean('is_shared')->default(0);
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
