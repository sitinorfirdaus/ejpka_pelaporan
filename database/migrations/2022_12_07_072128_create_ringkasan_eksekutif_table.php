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
            $table->string('pengurusan_belanjawan');
            $table->string('pengurusan_perakaunan');
            $table->string('perakaunan_kewangan');
            $table->string('perakaunan_pengurusan');
            $table->string('pengurusan_perolehan');
            $table->string('pengurusan_aset_stor');
            $table->integer('created_by');
            $table->softDeletes();
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
