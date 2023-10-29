<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\FieldChild;
use App\Models\FieldImage;
use App\Models\Image;
use App\Models\User;
use App\Models\Comment;
use App\Models\CommentImage;

class FieldController extends Controller
{
    public function index()
    {
        $fields = Field::all(); // Lấy tất cả dữ liệu từ bảng Fields

        return view('client.fields.index', compact('fields')); // Truyền dữ liệu vào view
    }
    public function detail(Request $request)
    {
        $id = $request->input('id');
        $field = Field::find($id);
        
        $user = User::where('username', $field->username)->first();

        $fieldChild = FieldChild::where('id_field', $id)->get();
        $fieldImages = FieldImage::where('id_field', $id)->get();

        if ($fieldImages->isNotEmpty()) {
            $imageUrls = Image::whereIn('id', $fieldImages->pluck('id_image'))->get();
        } else {
            $imageUrls = collect();
        }
        if ($fieldChild->isNotEmpty()) {
            // Lấy danh sách comment dựa trên id của field
            $comments = Comment::whereIn('id_field_child', $fieldChild->pluck('id'))->get();
            $commentCount = $comments->count();

            if ($comments->isNotEmpty()) {
                
                $commentImages = CommentImage::whereIn('id_comment', $comments->pluck('id'))->get();
                if ($commentImages->isNotEmpty()) {
                    $imageUrls2 = Image::whereIn('id', $commentImages->pluck('id_image'))->get();
                } else {
                    $imageUrls2 = collect();
                }
            } else {
                $commentImages = collect();
            }
            $user2 = User::whereIn('username', $comments->pluck('username'))->get();            
        } else {
            $comments = collect();
        }
        return view('client.fields.detail', [
            'field' => $field,
            'user' => $user,
            'fieldChild' => $fieldChild,
            'fieldImages' => $fieldImages,
            'imageUrls' => $imageUrls,
            'comments' => $comments,
            'user2' => $user2,
            'commentImages' => $commentImages,
            'imageUrls2' => $imageUrls2,
            'commentCount' => $commentCount
        ]);
    }
    
}

