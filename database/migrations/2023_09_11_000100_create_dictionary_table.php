<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictionaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('Type', 30)->nullable();
            $table->string('Attribute', 64)->nullable();
            $table->string('Value', 64)->nullable();
            $table->string('Format', 20)->nullable();
            $table->string('Vendor', 32)->nullable();
            $table->string('RecommendedOP', 32)->nullable();
            $table->string('RecommendedTable', 32)->nullable();
            $table->string('RecommendedHelper', 32)->nullable();
            $table->string('RecommendedTooltip', 512)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dictionary');
    }
}
