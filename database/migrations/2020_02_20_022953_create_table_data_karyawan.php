<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDataKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_karyawan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->longText('alamat');
            $table->integer('umur');
            $table->string('jender');
            $table->bigInteger('no_tlp');
            $table->date('tgl_lahir');
            $table->unsignedBigInteger('jabatan_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('pendidikan_id');
            $table->date('tgl_masuk');
            $table->timestamps();

            $table->foreign('jabatan_id')->references('id')->on('jabatan');
            $table->foreign('status_id')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_karyawan');
    }
}
