<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentImage extends Model
{

    protected $table = 'comment_image'; // Tên của bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng
    protected $fillable = ['id_comment', 'id_image', 'created_at', 'updated_at'];
}
