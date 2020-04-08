<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeApproved($query)
    {
        return $query->where('re_approved', 1);
    }

    public function scopeSpam($query)
    {
        return $query->where('re_spam', 1);
    }

    public function scopeNotSpam($query)
    {
        return $query->where('re_spam', 0);
    }
}
