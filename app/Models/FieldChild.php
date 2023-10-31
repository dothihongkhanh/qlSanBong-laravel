<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldChild extends Model
{
    protected $table = 'field_child'; // Tên của bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng

    // Các trường của bảng field_child
    protected $fillable = ['id_field', 'name_field_child', 'type_field_child', 'status', 'price', 'avt'];
}
