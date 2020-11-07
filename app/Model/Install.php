<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Install extends Model
{
    protected $table = 'installs';
    protected $fillable = [
        'id', 'key', 'value'
    ];
}
