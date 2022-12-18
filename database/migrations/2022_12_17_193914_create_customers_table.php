<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->smallIncrements('cui')->comment('Customer Id');
            $table->string('cun',50)->comment('Customer name');
            $table->string('cuc',50)->comment('Customer Code');
            $table->string('adr',100)->comment('Address');
            $table->integer('mbl')->comment('Mobile Number');
        });
        DB::statement("ALTER TABLE `customers` comment 'Customers Details'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
