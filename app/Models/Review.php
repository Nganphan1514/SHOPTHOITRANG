<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id', 'comment', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function replyUser()
    {
        return $this->belongsTo(User::class, 'reply_user_id', 'id'); // Mối quan hệ với người trả lời
    }
    public function replies()
    {
        return $this->hasMany(Reply::class, 'reviews_id'); // Cập nhật tên trường
    }
}
