<?php

namespace App\Models;
use App\Models\Order_detail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng

    protected $fillable = ['username', 'time_create', 'status', 'created_at', 'updated_at'];

    public function details()
    {
        return $this->hasMany(Order_detail::class,'id_order');
    }
}
