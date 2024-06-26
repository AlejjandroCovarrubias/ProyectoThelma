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
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->string('title_recipe');
            $table->text('descrip_recipe');
            $table->string('privacy');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('ubiFotoReceta')->nullable();
            $table->string('mimeFotoReceta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas');
    }
};
