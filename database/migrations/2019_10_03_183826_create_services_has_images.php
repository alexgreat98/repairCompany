<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesHasImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_has_images', function (Blueprint $table) {
            $table->bigInteger('services_id')->unsigned();
            $table->bigInteger('images_id')->unsigned();
            $table->foreign('services_id')
                ->references('id')
                ->on('services')
                ->onDelete('cascade');
            $table->foreign('images_id')
                ->references('id')
                ->on('images')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_has_images');
    }
}
