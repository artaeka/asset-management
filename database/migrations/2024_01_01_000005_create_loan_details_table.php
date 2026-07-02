<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loan_details', function (Blueprint $table) {
            $table->id('id_detail');
            $table->foreignId('id_peminjaman')
                  ->constrained('loans', 'id_peminjaman')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('id_asset')
                  ->constrained('assets', 'id_asset')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loan_details');
    }
};
