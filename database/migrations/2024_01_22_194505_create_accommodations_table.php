<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('accommodations', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('site')->nullable();
            $table->string('location_url', 500);
            $table->string('phone')->nullable();
            $table->boolean('whatsapp')->default(false);
            $table->boolean('active');
            $table->unsignedInteger('vacancies')->nullable();
            $table->json('people')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accommodations');
    }
};
