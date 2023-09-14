<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representer extends Model
{
    use HasFactory;
    protected $table = 'representers';
    protected $guarded = [''];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
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
