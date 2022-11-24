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
        Schema::create('otherconsigments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('consignment_number')->nullable();
            $table->string('client_name')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('contact')->nullable();
            $table->string('request_type')->nullable();
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
        Schema::dropIfExists('otherconsigments');
    }
};
