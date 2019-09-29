<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesHasPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_has_prices', function (Blueprint $table) {
            $table->bigInteger('prices_id')->unsigned();
            $table->bigInteger('services_id')->unsigned();
            $table->foreign('prices_id')
                ->references('id')
                ->on('prices')
                ->onDelete('cascade');
            $table->foreign('services_id')
                ->references('id')
                ->on('services')
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
        Schema::dropIfExists('services_has_prices');
    }
}
