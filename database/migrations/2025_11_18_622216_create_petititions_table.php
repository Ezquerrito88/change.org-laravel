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
        Schema::create('petititions', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('descripction');
            $table->text('destinatary');
            $table->integer('sigmes');
            $table->enum('status', ['acepter', 'pending']);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('category_id')->constrained('categories');
            // $table->string('image', 255, ); No se necesita
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petititions');
    }
};
