<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_models', function (Blueprint $table) {
            $table->id();
            $table->string('isbn_buku');
            $table->string('judul_buku');
            $table->string('tahun_terbit');
            $table->string('penerbit_buku');
            $table->string('pengarang_buku');
            $table->string('kategori_buku_id');
            $table->string('rak_buku_id');
            $table->string('jumlah_buku');
            $table->string('gambar');
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
        Schema::dropIfExists('buku_models');
    }
}
