<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_goods_detail extends Model
{
    use HasFactory;
    protected $table = 'order_goods_details'; // Tên table trong database
    protected $guarded = ['']; // Tùy chỉnh mọi dữ liệu

    public function goods()
    {
        return $this->belongsTo(Goods::class, 'goods_id');
    }
}
