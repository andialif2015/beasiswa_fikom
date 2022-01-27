<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('tempat_lahir');
            $table->string('phone');
            $table->date('tanggal_lahir');
            $table->enum('status', ['DALAM PROSES', 'BERKAS DITERIMA', 'PROSES SELEKSI', 'DITERIMA', 'TIDAK DITERIMA']);
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
        Schema::dropIfExists('mahasiswa');
    }
}
