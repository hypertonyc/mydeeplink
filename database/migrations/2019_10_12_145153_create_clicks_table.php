<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clicks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('deeplink_id');
            $table->unsignedBigInteger('webuser_id');
            $table->tinyInteger('platform');
            $table->string('geo');
            $table->timestamps();

            $table->foreign('deeplink_id')->references('id')->on('deeplinks');
            $table->foreign('webuser_id')->references('id')->on('webusers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clicks');
    }
}
