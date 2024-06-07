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
        Schema::create('gurus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_guru')->nullable()->unique();
            $table->string('kelas_id')->nullable();
            $table->string('nama_guru');
            $table->date('tgl_lahir');
            $table->string('no_telp');
            $table->string('agama');
            $table->string('jenis_kelamin');
            $table->string('jabatan');
            $table->string('foto');
            $table->timestamps();
            $table->foreign('kelas_id')->references('nama_kelas')->on('kelas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
