<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'order_detail'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng

    protected $fillable = ['id_order', 'id_field_child', 'time_start', 'time_end', 'time_order', 'note', 'created_at', 'updated_at'];

    public function fieldChild()
    {
        return $this->belongsTo(FieldChild::class,'id_field_child');
    }
}
