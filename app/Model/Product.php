<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'price',
        'sale',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'description',
        'information',
        'total_number',
        'active',
        'hot',
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
