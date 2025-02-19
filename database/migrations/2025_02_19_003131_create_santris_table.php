<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nis')->unique();
            $table->string('kelas');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Bisa NULL saat pendaftaran
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};
