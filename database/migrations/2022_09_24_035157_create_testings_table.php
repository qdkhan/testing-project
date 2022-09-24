<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testings', function (Blueprint $table) {
            $table->id();
            $table->char('name',50);
            $table->char('name',150)->change();
            $table->string('address',100)->nullable();
            $table->ipAddress('visitor');
            $table->date('dob')->nullable();
            $table->json('movies')->default(new Expression('(JSON_ARRAY())'));
            $table->timestamps();
            $table->dropColumn(['visitor']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testings');
    }
};
