<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'branch_id',
        'note',
        'active',
    ];

    public function branch() {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
