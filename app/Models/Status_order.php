<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_order extends Model
{
    use HasFactory;
    protected $table = 'status_order'; // Tên table trong database
    protected $guarded = ['']; // Tùy chỉnh mọi dữ liệu
}
