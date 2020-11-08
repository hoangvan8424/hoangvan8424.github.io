<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'contract_code',
        'photographer_id',
        'shopper_id',
        'makeup_id',
        'product_demo_id',
        'product_print_id',
        'product_id',
        'photography_date',
        'note',
        'branch_id',
    ];

    public function photographer() {
        return $this->belongsTo(User::class, 'photographer_id');
    }

    public function shopper() {
        return $this->belongsTo(User::class, 'shopper_id');
    }

    public function makeup() {
        return $this->belongsTo(User::class, 'makeup_id' );
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function product_demo() {
        return $this->belongsTo(ProductDemo::class, 'product_demo_id');
    }

    public function product_print() {
        return $this->belongsTo(ProductPrint::class, 'product_print_id');
    }

    public function branch() {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
