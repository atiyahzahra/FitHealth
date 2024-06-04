<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatsTable extends Migration
{
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat');
            $table->integer('dosis');
            $table->string('satuan');
            $table->string('periode');
            $table->json('jam_minum');
            $table->string('aturan_minum');
            $table->date('tanggal_mulai');
            $table->integer('lama_konsumsi');
            $table->string('satuan_konsumsi');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('obats');
    }
}
