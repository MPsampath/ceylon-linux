<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFreeIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_issues', function (Blueprint $table) {
            $table->smallIncrements('fii')->comment('Free Issues Id');
            $table->string('fil',200)->comment('Free Issues lable');
            $table->tinyInteger('typ')->comment('Type(1=Flat,2=Multiple)');
            $table->smallInteger('ppi')->unsigned()->index()->comment('Purchase Product Id');
            $table->smallInteger('fpi')->unsigned()->index()->comment('Free Product Id');
            $table->integer('pqt')->comment('Purchase Quntity');
            $table->integer('fqt')->comment('Free Quntity');
            $table->integer('lmt')->comment('Lower limit');
            $table->integer('ult')->comment('Upper limit');

            $table->foreign('ppi')->references('pri')->on('products')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('fpi')->references('pri')->on('products')->onDelete('restrict')->onUpdate('restrict');
        });
        DB::statement("ALTER TABLE `free_issues` comment 'Free Issues Details'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('free_issues');
    }
}
