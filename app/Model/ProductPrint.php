<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ProductPrint extends Model
{
    protected $fillable = [
        'product_id',
        'employee_id',
        'date_send_selected_code',
        'review_date_1',
        'review_date_2',
        'review_date_3',
        'closing_date',
        'delivery_date_in_branch',
        'customer_receive_date',
        'note',
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'employee_id');
    }
}