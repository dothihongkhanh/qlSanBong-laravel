<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        // Xử lý tạo mới comment
    }

    public function edit(Request $request, $id)
    {
        // Xử lý chỉnh sửa comment
    }

    public function delete(Request $request, $id)
    {
        // Xử lý xóa comment
    }
}
