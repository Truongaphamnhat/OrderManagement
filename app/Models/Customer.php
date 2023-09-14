<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $guarded = [''];

    // Trạng thái của khách hàng => 1: Mới | 2: Tiềm năng | 3: Đã mua hàng | -1: Không quay lại

    const STATUS_DEFAULT = 1; // Mới

    const STATUS_POTENTIAL = 2; // Potential = tiềm năng

    const STATUS_CANCEL = -1; // Không quay lại

    const STATUS_FINISH = 3; //Đã mua hàng

    public $setStatus = [
        self::STATUS_DEFAULT => [
            'name' => 'Mới',
            'class' => 'badge badge-light'
        ],
        self::STATUS_POTENTIAL => [
            'name' => 'Tiềm năng',
            'class' => 'badge badge-primary'
        ],
        self::STATUS_FINISH => [
            'name' => 'Đã mua hàng',
            'class' => 'badge badge-success'
        ],
        self::STATUS_CANCEL => [
            'name' => 'Không quay lại',
            'class' => 'badge badge-danger'
        ],
    ];

    public function getStatus()
    {
        return Arr::get($this->setStatus, $this->status, []);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); // Liên kết 1-1, 1 khách hàng thuộc 1 danh mục
    }

    // Customer thuộc user nào tạo
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

     // Location
     public function province()
     {
         return $this->belongsTo(Province::class, 'province_id');
     }
     public function district()
     {
         return $this->belongsTo(District::class, 'district_id');
     }
     public function ward()
     {
         return $this->belongsTo(Ward::class, 'ward_id');
     }
}
