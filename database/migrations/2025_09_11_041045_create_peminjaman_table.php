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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam', 100)->required;
            $table->string('kelas',100)->required;
            $table->string('email',100)->required;
            $table->string('nama_buku',100)->required;
            $table->integer('banyak_buku')->required;
            $table->integer('lama_meminjam')->required;
            $table->enum('status', ['dipinjam','dikembalikan'])->default('dipinjam');
            $table->boolean('is_notified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
