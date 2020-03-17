<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    CONST PUBLIC_STATUS = 1;
    CONST PRIVATE_STATUS = 0;
    protected $table = 'categories';
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
        return array_get($this->status, $this->c_active, '[N\A]');
    }

}
