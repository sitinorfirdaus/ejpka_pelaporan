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
        Schema::create('belanjawan', function (Blueprint $table) {
            $table->id();
            $table->decimal('input1',10,2);
            $table->decimal('input2',10,2);
            $table->decimal('output1',10,2);
            $table->decimal('input3',10,2);
            $table->decimal('input4',10,2);
            $table->decimal('output2',10,2);
            $table->decimal('output3',10,2);
            $table->decimal('total',10,2);
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
        Schema::dropIfExists('belanjawan');
    }
};
