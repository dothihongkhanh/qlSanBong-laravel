<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng
    protected $fillable = ['url', 'created_at', 'updated_at'];
}
