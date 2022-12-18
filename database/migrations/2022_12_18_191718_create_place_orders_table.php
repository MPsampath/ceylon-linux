<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePlaceOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_orders', function (Blueprint $table) {
            $table->smallIncrements('poi')->comment("PO Id");
            $table->string('pon')->comment('PO Number');
            $table->smallInteger('cui')->unsigned()->index()->comment('Coustomer Id');
            $table->date('ord')->comment('Order Date');
            $table->time('odt')->comment('Order Time');

            $table->foreign('cui')->references('cui')->on('customers')->onDelete('restrict')->onUpdate('restrict');
        });
        DB::statement("ALTER TABLE `place_orders` comment 'Place Orders'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_orders');
    }
}
