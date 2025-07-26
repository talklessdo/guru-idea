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
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // $table->string('nama_lengkap');
            $table->string('nik', 20)->nullable();
            $table->string('nuptk', 20)->nullable();
            $table->enum('status_pegawai',['Non PNS','PNS'])->default("Non PNS");
            $table->string('nip', 20)->nullable();
            $table->enum('jk', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('nomor_hp', 13)->nullable();
            $table->string('tugas')->nullable();
            
            $table->string('penempatan')->nullable();
            $table->integer('total_jtm')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
