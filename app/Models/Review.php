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
        return $this->belongsTo('users');
    }

    public function scopeApproved($query)
    {
        return $query->where('re_approved', true);
    }

    public function scopeSpam($query)
    {
        return $query->where('re_spam', true);
    }

    public function scopeNotSpam($query)
    {
        return $query->where('re_spam', false);
    }
}
