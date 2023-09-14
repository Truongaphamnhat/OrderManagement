<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts'; // Tên table trong database
    protected $guarded = ['']; // Tùy chỉnh mọi dữ liệu

    const GENDER_MALE = 'Nam'; // giới tính nam

    const GENDER_FEMALE = 'Nữ'; // giới tính nữ

    const GENDER_SELECT = ''; // chọn giới tính

    public $setGender = [
        self::GENDER_SELECT => [
            'name' => '--Chọn giới tính--',
            // 'class' => 'badge badge-primary'
        ],
        self::GENDER_MALE => [
            'name' => 'Nam',
            // 'class' => 'badge badge-light'
        ],
        self::GENDER_FEMALE => [
            'name' => 'Nữ',
            // 'class' => 'badge badge-primary'
        ],
       
    ];

    public function getGender()
    {
        return Arr::get($this->setGender, $this->gender, []);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id'); // Liên kết 1-1, 1 khách hàng thuộc 1 liên hệ
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id'); // Liên kết 1-1, 1 chức vụ thuộc 1 liên hệ
    }

     // Liên hệ thuộc user nào tạo
     public function user()
     {
         return $this->belongsTo(User::class, 'user_id');
     }
    
}
