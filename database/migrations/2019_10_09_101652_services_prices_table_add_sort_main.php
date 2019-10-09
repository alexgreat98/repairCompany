<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServicesPricesTableAddSortMain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->integer('sort')->default(250);
            $table->boolean('show_on_main')->default(false);
        });
        Schema::table('portfolio', function (Blueprint $table) {
            $table->integer('sort')->default(250);
            $table->boolean('show_on_main')->default(false);

        });
        Schema::table('prices', function (Blueprint $table) {
            $table->integer('sort')->default(250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
