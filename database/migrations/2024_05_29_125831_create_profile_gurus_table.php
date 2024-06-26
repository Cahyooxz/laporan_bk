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
        Schema::create('profile_gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->foreign('nip')->references('nisn_or_nip')->on('users')->onDelete('cascade'); 
            $table->string('jk');
            $table->string('kelas');
            $table->string('bagian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_gurus');
    }
};
