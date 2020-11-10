<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    protected $fillable = [
        'date', 'branch_id', 'work', 'status', 'note', 'customer_id'
    ];

    public function branch() {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
