<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'field'; // Tên của bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng

    // Các trường của bảng field
    protected $fillable = ['name_field', 'username', 'id_sub_district', 'description', 'address', 'locate', 'time_open', 'time_close', 'price', 'avt'];
}

