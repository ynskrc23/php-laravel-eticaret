<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblShoppingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shopping', function (Blueprint $table) {
            $table->increments('shopping_id');
            $table->string('shopping_email');
            $table->string('shopping_first_name');
            $table->string('shopping_last_name');
            $table->string('shopping_adres');
            $table->string('shopping_mobile_number');
            $table->string('shopping_ctiy');
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
        Schema::dropIfExists('tbl_shopping');
    }
}
