<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_size', function (Blueprint $table) {
            $table->id();  // Tạo khóa chính (id tự tăng)
            $table->foreignId('product_id')  // Khóa ngoại liên kết với bảng products
                ->constrained()  // Tự động liên kết với bảng products (với trường product_id)
                ->onDelete('cascade');  // Nếu sản phẩm bị xóa, các size liên quan cũng sẽ bị xóa

            $table->foreignId('size_id')  // Khóa ngoại liên kết với bảng sizes
                ->constrained()  // Tự động liên kết với bảng sizes (với trường size_id)
                ->onDelete('cascade');  // Nếu kích thước bị xóa, liên kết này cũng sẽ bị xóa

            $table->integer('quantity')->default(0);  // Số lượng của từng size

            $table->timestamps();  // Tạo trường created_at và updated_at

            // Đảm bảo không có hai bản ghi với cùng product_id và size_id
            $table->unique(['product_id', 'size_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_size');
    }
}
