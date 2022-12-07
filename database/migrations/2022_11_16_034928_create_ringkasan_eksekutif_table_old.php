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
        Schema::create('ringkasan_eksekutif', function (Blueprint $table) {
            $table->id();
            $table->integer('master_id');
            $table->string('input1');
            $table->string('input2');
            $table->string('output1');
            $table->string('input3');
            $table->string('input4');
            $table->string('output2');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ringkasan_eksekutif');
    }
};
