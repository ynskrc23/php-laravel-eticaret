<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payment_details', function (Blueprint $table) {
            $table->increments('payment_details_id');
            $table->integer('payment_details_product_id');
            $table->string('payment_details_product_name');
            $table->integer('payment_details_product_quantity');
            $table->string('payment_details_product_price');
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
        Schema::dropIfExists('tbl_payment_details');
    }
}
