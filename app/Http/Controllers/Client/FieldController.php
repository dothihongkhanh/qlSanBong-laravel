<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\FieldChild;
use App\Models\FieldImage;
use App\Models\Image;
use App\Models\User;

class FieldController extends Controller
{
    public function index()
    {
        $fields = Field::all(); // Lấy tất cả dữ liệu từ bảng Fields

        return view('client.fields.index', compact('fields')); // Truyền dữ liệu vào view
    }
    public function detail(Request $request) {
        $id = $request->input('id');
        $field = Field::find($id);
        
        // Tìm người dùng dựa trên user_id hoặc username (tùy theo cấu trúc cơ sở dữ liệu của bạn)
        $user = User::where('username', $field->username)->first();
    
        $fieldChild = FieldChild::where('id_field', $id)->get();
        $fieldImages = FieldImage::where('id_field', $id)->get();
    
        if ($fieldImages->isNotEmpty()) {
            $imageUrls = Image::whereIn('id', $fieldImages->pluck('id_image'))->get();
        } else {
            $imageUrls = collect(); // Tạo một collection rỗng
        }
    
        return view('client.fields.detail', [
            'field' => $field,
            'user' => $user,
            'fieldChild' => $fieldChild,
            'fieldImages' => $fieldImages,
            'imageUrls' => $imageUrls,
        ]);
    }
    
}

