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
        Schema::create('tblmengurus', function (Blueprint $table) {
            $table->id();
            $table->integer('master_id');
            $table->string('melebihi penjelasan');
            $table->string('melebihi tindakan');
            $table->string('kurang penjelasan');
            $table->string('kurang tindakan');
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
        Schema::dropIfExists('tblmengurus');
    }
};
