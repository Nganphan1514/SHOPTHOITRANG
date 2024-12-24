<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'content',
        'menu_id',
        'price',
        'price_sale',
        'active',
        'thumb',
        'Made_in'
    ];

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')
            ->withDefault(['name' => '']);
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_size')->withPivot('quantity');
    }
    public function sizes_have()
    {
        return $this->belongsToMany(Size::class, 'product_size', 'product_id', 'size_id')
        ->withPivot('quantity')
        ->wherePivot('quantity', '>', 0); // Lọc ra các size còn hàng
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }



}
