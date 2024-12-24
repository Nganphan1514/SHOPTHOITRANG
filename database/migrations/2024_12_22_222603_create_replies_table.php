<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->id(); // Khóa chính tự động
            $table->unsignedBigInteger('reviews_id'); // Khóa ngoại liên kết đến bảng reviews
            $table->unsignedBigInteger('user_id')->nullable(); // Khóa ngoại liên kết đến bảng users
            $table->text('reply'); // Nội dung câu trả lời
            $table->timestamps(); // Thời gian tạo và cập nhật

            // Thêm khóa ngoại
            $table->foreign('reviews_id')->references('id')->on('reviews')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
