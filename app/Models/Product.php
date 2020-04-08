<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    CONST PUBLIC_STATUS = 1;
    CONST PRIVATE_STATUS = 0;

    CONST HOT_TYPE = 1;
    CONST GENERAL_TYPE = 0;

    protected $table = 'products';
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

    protected $type = [
      1 => [
          'name' => 'Nổi bật',
          'label' => 'warning'
      ],
      0 => [
          'name' => 'Thường',
          'label' => 'primary'
      ]
    ];

    public function getStatus()
    {
        return array_get($this->status, $this->pro_active, '[N\A]');
    }

    public function getType()
    {
        return array_get($this->type, $this->hot, '[N\A]');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'pro_category_id');
    }

    public function getBrandName()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
