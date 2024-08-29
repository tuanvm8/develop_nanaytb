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
        Schema::create('watch_video_history', function (Blueprint $table) {
            $table->id(); // Tạo cột ID tự tăng
            $table->unsignedBigInteger('product_id'); // Dùng unsignedBigInteger cho ID sản phẩm
            $table->unsignedBigInteger('user_id'); // Dùng unsignedBigInteger cho ID người dùng
            $table->string('title'); // Tên của video
            $table->string('url'); // URL của video
            $table->integer('point'); // Điểm của người dùng sau khi xem video
            $table->string('user_name'); // Tên của người dùng
            $table->timestamps(); // Tạo cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
