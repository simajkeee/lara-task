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
            $table->string('auto_brand');
            $table->unsignedBigInteger('parking_number_id');
            $table->date('checkin_date');
            $table->date('checkout_date');
            $table->unsignedBigInteger('customer_id');
            $table->float('price');
            $table->timestamps();

            $table->foreign('parking_number_id')
                  ->references('id')->on('parkings');

            $table->foreign('customer_id')
                  ->references('id')->on('customers');
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
