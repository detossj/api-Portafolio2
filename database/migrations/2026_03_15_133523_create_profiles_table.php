<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('hero_greeting'); 
            $table->string('name');
            $table->string('hero_title');
            $table->text('hero_bio');
            $table->text('about_description');
            $table->string('about_avatar');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->string('contact_github');
            $table->string('contact_linkedin')->nullable();
            $table->string('contact_location');
            $table->string('footer_short_bio');
            $table->json('theme_colors'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
