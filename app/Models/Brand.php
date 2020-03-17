<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    CONST BRAND_DISPLAY = 1;
    CONST BRAND_HIDE = 0;
    protected $table='brands';
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
        return array_get($this->status, $this->brand_status, '[N\A]');
    }

    public function getNameCategory()
    {
        return $this->belongsTo(Category::class, 'c_id');
    }

}
