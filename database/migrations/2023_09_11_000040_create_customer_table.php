<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->string('account', 30)
                ->index('account')
                ->default('');

            $table->string('agreement', 30)
                ->index('agreement')
                ->default('');

            $table->string('firstname', 50)->index('firstname');
            $table->string('lastname', 50)->index('lastname');
            $table->string('company', 100)->index('company')->default('');
            $table->string('email', 100)->index('email')->default('');
            $table->string('username', 64)->primary();
            $table->string('password', 64);
            $table->bigInteger('svc_type')->unsigned();
            $table->bigInteger('svc_id')->unsigned();
            $table->string('phone', 15)
                ->index('phone')
                ->default('');

            $table->string('mobile', 15)
                ->index('mobile')
                ->default('');

            $table->string('address', 100)
                ->index('address')
                ->default('');

            $table->string('city', 50)
                ->default('');

            $table->string('state', 50)
                ->default('');

            $table->string('zip', 8)
                ->default('');

            $table->decimal('gpslat', 17, 14)
                ->nullable();

            $table->decimal('gpslong', 17, 14)
                ->nullable();

            $table->string('comment', 500)->nullable();
            $table->index('comment');

            $table->timestamps();
            $table->foreign('svc_type')->references('id')->on('service_type')->onDelete('restrict');
            $table->foreign('svc_id')->references('id')->on('service')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
}
