<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field; // Sử dụng model Field

class FieldController extends Controller
{
    public function index()
    {
        $fields = Field::all(); // Lấy tất cả dữ liệu từ bảng Fields

        return view('client.home.index', compact('fields')); // Truyền dữ liệu vào view
    }
}

