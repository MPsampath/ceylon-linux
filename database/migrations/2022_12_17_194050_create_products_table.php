<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->smallIncrements('pri')->comment('Product id');
            $table->string('prn',200)->comment('Product Name');
            $table->string('prc',100)->comment('Product Code');
            $table->double('cst')->comment('Price');
            $table->date('exd')->comment('Expiry Date');
        });
        DB::statement("ALTER TABLE `products` comment 'Products Details'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
