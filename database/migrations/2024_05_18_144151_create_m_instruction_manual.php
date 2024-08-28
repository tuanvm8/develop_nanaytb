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
        Schema::create('m_instruction_manual', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->longText('content')->nullable();
            $table->string('slug')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->unsignedBigInteger('user_id');
            $table->string('image')->nullable();
            $table->integer('view_count')->default(200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_instruction_manual');
    }
};
