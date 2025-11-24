<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('petition_user', function (Blueprint $table) {
            // Composite Primary Key
            $table->primary(['user_id', 'petition_id']);

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Points to 'petitions' table
            $table->foreignId('petition_id')->constrained('petitions')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('petition_user');
    }
};
