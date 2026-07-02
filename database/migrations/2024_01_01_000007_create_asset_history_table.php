<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asset_history', function (Blueprint $table) {
            $table->id('id_history');
            $table->foreignId('id_asset')
                  ->constrained('assets', 'id_asset')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->string('aktivitas');
            $table->timestamp('tanggal')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asset_history');
    }
};
