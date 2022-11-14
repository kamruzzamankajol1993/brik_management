<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caranddrivers', function (Blueprint $table) {
            $table->id();
            $table->string('main_date')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('car_number')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('caranddrivers');
    }
};
