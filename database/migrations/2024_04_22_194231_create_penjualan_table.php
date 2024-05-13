<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->Increments('id_penjualan');
            $table->integer('id_produk');
            $table->integer('jumlah');
            $table->string('nama_pembeli');
            $table->string('no_hp');
            $table->string('alamat');
            $table->enum('keterangan', ['proses','selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
