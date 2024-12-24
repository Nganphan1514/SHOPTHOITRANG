<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
        protected $table = 'sizes'; // Tên bảng sizes

    protected $fillable = ['name'];  // Chỉ cho phép lưu trữ trường 'name'

        public function products()
    {
        return $this->belongsToMany(Product::class, 'product_size')->withPivot('quantity');
    }
}
