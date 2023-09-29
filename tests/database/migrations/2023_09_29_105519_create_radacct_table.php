<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadacctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radacct', function (Blueprint $table) {
            $table->bigInteger('radacctid')->primary();
            $table->string('acctsessionid', 64)->default('')->index('acctsessionid');
            $table->string('acctuniqueid', 32)->default('')->unique('acctuniqueid');
            $table->string('username', 64)->default('')->index('username');
            $table->string('realm', 64)->default('');
            $table->string('nasipaddress', 15)->default('')->index('nasipaddress');
            $table->string('nasportid', 64)->nullable();
            $table->string('nasporttype', 32)->nullable();
            $table->dateTime('acctstarttime')->nullable()->index('acctstarttime');
            $table->dateTime('acctupdatetime')->nullable();
            $table->dateTime('acctstoptime')->nullable()->index('acctstoptime');
            $table->integer('acctinterval')->nullable()->index('acctinterval');
            $table->unsignedInteger('acctsessiontime')->nullable()->index('acctsessiontime');
            $table->string('acctauthentic', 32)->nullable();
            $table->string('connectinfo_start', 128)->nullable();
            $table->string('connectinfo_stop', 128)->nullable();
            $table->bigInteger('acctinputoctets')->nullable();
            $table->bigInteger('acctoutputoctets')->nullable();
            $table->string('calledstationid', 50)->default('');
            $table->string('callingstationid', 50)->default('');
            $table->string('acctterminatecause', 32)->default('');
            $table->string('servicetype', 32)->nullable();
            $table->string('framedprotocol', 32)->nullable();
            $table->string('framedipaddress', 15)->default('')->index('framedipaddress');
            $table->string('framedipv6address', 45)->default('')->index('framedipv6address');
            $table->string('framedipv6prefix', 45)->default('')->index('framedipv6prefix');
            $table->string('framedinterfaceid', 44)->default('')->index('framedinterfaceid');
            $table->string('delegatedipv6prefix', 45)->default('')->index('delegatedipv6prefix');
            $table->string('class', 64)->nullable()->index('class');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('radacct');
    }
}
