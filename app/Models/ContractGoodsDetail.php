<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractGoodsDetail extends Model
{
    use HasFactory;
    protected $table = 'contract_goods_detail'; // Tên table trong database
    protected $guarded = ['']; // Tùy chỉnh mọi dữ liệu
    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }
    public function goods()
    {
        return $this->belongsTo(Goods::class, 'goods_id');
    }
    public function contract_type()
    {
        return $this->belongsTo(ContractType::class, 'contract_type_id');
    }
    public function user()
    {
        return $this->belongsTo(Goods::class, 'user_id');
    }
    public function customer()
    {
        return $this->belongsTo(Goods::class, 'customer_id');
    }
}
