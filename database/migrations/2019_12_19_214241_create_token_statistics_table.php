<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokenStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('token_statistics', function (Blueprint $table) {
            $table->unsignedBigInteger('date')->index();

            $table->unsignedBigInteger('token_id')->nullable();
            $table->string('ip_address');
            $table->boolean('success')->default(false);
            $table->json('request');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('token_statistics');
    }
}
