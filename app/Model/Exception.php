<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Exception extends Model
{
    protected $table = 'fail_jobs';
    protected $fillable = [
        'id', 'connection', 'queue', 'payload', 'exception', 'failed_at'
    ];
}
