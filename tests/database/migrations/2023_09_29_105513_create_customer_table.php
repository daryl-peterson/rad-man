<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->string('account', 30)->default('')->index('account');
            $table->string('agreement', 30)->default('')->index('agreement');
            $table->string('firstname', 50)->index('firstname');
            $table->string('lastname', 50)->index('lastname');
            $table->string('company', 100)->default('')->index('company');
            $table->string('email', 100)->default('')->index('email');
            $table->string('username', 64)->primary();
            $table->string('password', 64);
            $table->unsignedBigInteger('svc_type');
            $table->unsignedBigInteger('svc_id');
            $table->string('phone', 15)->default('')->index('phone');
            $table->string('mobile', 15)->default('')->index('mobile');
            $table->string('address', 100)->default('')->index('address');
            $table->string('city', 50)->default('');
            $table->string('state', 50)->default('');
            $table->string('zip', 8)->default('');
            $table->decimal('gpslat', 17, 14)->nullable();
            $table->decimal('gpslong', 17, 14)->nullable();
            $table->string('comment', 500)->nullable()->index('customer_comment_index');
            $table->timestamps();
            
            $table->foreign('svc_id', 'customer_svc_id_foreign')->references('id')->on('service');
            $table->foreign('svc_type', 'customer_svc_type_foreign')->references('id')->on('service_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
