<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->id('id_approval');
            $table->foreignId('id_peminjaman')
                  ->constrained('loans', 'id_peminjaman')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('approver')
                  ->constrained('users', 'id_user')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();
            $table->enum('status_approval', ['menunggu', 'disetujui', 'ditolak']);
            $table->date('tanggal_approval')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
