<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id('id_asset');
            $table->string('asset_code')->unique();
            $table->string('nama_asset');
            $table->foreignId('id_kategori')
                  ->constrained('categories', 'id_kategori')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();
            $table->string('serial_number')->nullable()->unique();
            $table->enum('kondisi', ['baik', 'rusak_ringan', 'rusak_berat']);
            $table->enum('status', ['tersedia', 'dipinjam', 'perbaikan', 'tidak_aktif']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
