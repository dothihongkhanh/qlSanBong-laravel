<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment'; // Tên của bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng

    protected $fillable = ['username', 'id_field_child', 'time', 'star', 'content','created_at','updated_at'];
    
}
