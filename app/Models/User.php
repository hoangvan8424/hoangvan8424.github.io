<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    CONST PUBLIC_STATUS = 1;
    CONST PRIVATE_STATUS = 0;
    protected $table = 'users';

    protected $status = [
        1 => [
            'name' => 'Hiển thị',
            'label' => 'success'
        ],
        0 => [
            'name' => 'Ẩn',
            'label' => 'danger'
        ]

    ];
    public function getStatus()
    {
        return array_get($this->status, $this->active, '[N\A]');
    }
}
