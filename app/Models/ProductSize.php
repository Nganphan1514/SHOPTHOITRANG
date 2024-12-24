<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    protected $table = 'product_size'; // Tên bảng

    protected $fillable = [
        'product_id',
        'size_id',
        'quantity',
    ];

    // Quan hệ với sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    // Quan hệ với size
    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }
    // public function sizes_have()
    // {
    //     return $this->belongsToMany(Size::class, 'product_sizes', 'product_id', 'size_id')
    //     ->withPivot('quantity');
    // }
}
