<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePlaceOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_order_items', function (Blueprint $table) {
            $table->tinyIncrements('rid')->comment('Item record Id');
            $table->smallInteger('poi')->unsigned()->index()->comment("Place Order Id");
            $table->smallInteger('pri')->unsigned()->index()->comment("Product Id");
            $table->double('qty')->comment('Quntity');

            $table->foreign('poi')->references('poi')->on('place_orders')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('pri')->references('pri')->on('products')->onDelete('restrict')->onUpdate('restrict');
        });

        DB::statement("ALTER TABLE `place_order_items` comment 'Place Order Items'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_order_items');
    }
}
