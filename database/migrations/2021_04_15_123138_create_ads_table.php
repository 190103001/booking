<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->integer('owner_id');
            $table->string('rent_out');
            $table->integer('number_of_rooms');
            $table->integer('price');
            $table->string('rental_period');
            $table->integer('floor');
            $table->integer('from');
            $table->integer('total_area');
            $table->integer('residential_area');
            $table->integer('kitchen_area');
            $table->string('city');
            $table->string('address');
            $table->string('phone_number');
            $table->text('ad_text');
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
        Schema::dropIfExists('ads');
    }
}
