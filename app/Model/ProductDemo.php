<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ProductDemo extends Model
{
    protected $fillable = [
        'product_id',
        'employee_id',
        'receive_demo_date',
        'expected_delivery_date_1',
        'expected_delivery_date_2',
        'expected_delivery_date_3',
        'delivery_date',
        'note',
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
