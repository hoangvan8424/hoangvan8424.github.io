<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'branch_id',
        'name',
        'price',
        'quantity',
        'note',
        'active',
    ];

    public function branch() {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
