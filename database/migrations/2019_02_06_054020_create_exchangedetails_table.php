<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangedetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchangedetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exchange_id');
            $table->integer('product_id');
            $table->timestamps();
        });

        
    }



    public function down()
    {
        Schema::dropIfExists('exchangedetails');
    }
}
