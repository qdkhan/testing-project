<?php

use Illuminate\Database\Migrations\Migration;
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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->binary('photo');
            $table->bigInteger('votes');
            $table->char('name', 100);
            $table->dateTimeTz('created_at', $precision = 0);
            $table->decimal('amountdeci', $precision = 8, $scale = 2);
            $table->double('amountdoub', 8, 2);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
