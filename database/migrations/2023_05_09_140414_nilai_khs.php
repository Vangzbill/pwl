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
        Schema::create('nilai_khs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mhs_id');
            $table->unsignedBigInteger('matkul_id');
            $table->foreign('mhs_id')->references('id')->on('mahasiswa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('matkul_id')->references('id')->on('matkul')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nilai');
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
        //
    }
};
