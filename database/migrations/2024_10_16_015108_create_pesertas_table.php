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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kegiatan');
            $table->bigInteger('nip');
            $table->string('name');
            $table->string('unit_kerja');
            $table->string('satuan_kerja');
            $table->string('jabatan');
            $table->string('pangkat');
            $table->string('golongan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
