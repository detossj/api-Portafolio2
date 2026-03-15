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
        Schema::create('about_cards', function (Blueprint $table) {
            $table->id();
            $table->string('icon');  // Ej: 'User', 'GraduationCap'
            $table->string('title'); // Ej: 'Perfil'
            $table->string('text');  // Ej: 'Desarrollador en formación'
            $table->integer('order')->default(0); // Para ordenarlas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_cards');
    }
};
