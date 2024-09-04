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
        Schema::create('user_interactions', function (Blueprint $table) {
            $table->id('interaction_id');
            $table->foreignId('user_id_1')->constrained('users', 'user_id');
            $table->foreignId('user_id_2')->constrained('users', 'user_id');
            $table->text('notes');
            $table->string('interaction_type');
            $table->date('interaction_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_interactions');
    }
};
