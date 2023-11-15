<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order'; // Tên của bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng

    // Các trường của bảng field
    protected $fillable = ['username', 'time_create', 'status'];
}
