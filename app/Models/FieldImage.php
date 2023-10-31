<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldImage extends Model
{
    protected $table = 'field_image'; // Tên của bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng

    // Các trường của bảng field_image
    protected $fillable = ['id_field', 'id_image','created_at','updated_at'];
}
