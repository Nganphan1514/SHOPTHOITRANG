<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $fillable = [
        'user_id',
        'customer_id',
        'product_id',
        'size_id',
        'pty',
        'price',
        'status_id',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public static function totalRevenue()
    {
        return self::sum(DB::raw('pty * price')); // Tính tổng doanh thu
    }
    public static function revenueByProduct()
    {
        return self::select('product_id', DB::raw('SUM(pty * price) as total_revenue'))
        ->groupBy('product_id')
        ->with('product') // Gọi luôn thông tin sản phẩm liên quan
        ->get();
    }
//moi them
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    public function sizes()
{
    return $this->belongsTo(Size::class, 'size_id', 'id');
}
    public function status()
    {
        return $this->belongsTo(StatusOrder::class, 'status_id');
    }
    

}

