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
        Schema::create('buku_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('nama_guru');
            $table->string('mata_pelajaran')->nullable();
            $table->string('slug');

            // Jenis Buku Kerja: 1, 2, 3, atau 4
            $table->enum('kategori', ['1', '2', '3', '4']);
            $table->enum('status', ['approve', 'pending', 'decline']);
            $table->enum('kelas', ['x', 'xi', 'xii']);

            $table->text('catatan')->nullable(); // isi dari indikator
            $table->foreignId('guru_id')->constrained(
                table: 'users', indexName: 'buker_guru_id' //indexName bebas
            );
            $table->foreignId('indikator_id')->constrained(
                table: 'indikator', indexName: 'buker_indikator_id' //indexName bebas
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku_kerja');
    }
};
