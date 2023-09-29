<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadUserGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radusergroup', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 64)->default('')->index();
            $table->string('groupname', 64)->default('')->index();
            $table->integer('priority')->default(1);

            $table->index(['username', 'groupname', 'id']);

            $table->foreign('username')->references('username')->on('customer');
            $table->foreign('groupname')->references('name')->on('service')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('radusergroup');
    }
}
