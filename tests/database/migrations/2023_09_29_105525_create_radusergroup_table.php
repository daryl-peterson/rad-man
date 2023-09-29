<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadusergroupTable extends Migration
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
            $table->string('username', 64)->default('');
            $table->string('groupname', 64)->default('');
            $table->integer('priority')->default(1);
            
            $table->index(['username', 'groupname', 'id'], 'radusergroup_username_groupname_id_index');
            $table->foreign('groupname', 'radusergroup_groupname_foreign')->references('name')->on('service');
            $table->foreign('username', 'radusergroup_username_foreign')->references('username')->on('customer');
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
