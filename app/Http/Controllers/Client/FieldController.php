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
        $averageStarsByField = []; // Mảng lưu trữ trung bình số sao cho từng sân
        $priceByField = []; // Mảng lưu trữ giá trị price tối thiểu và tối đa
        
        foreach ($fields as $field) {
            $idFieldToCalculateAverage = $field->id;
            $comments = Comment::whereIn('id_field_child', function($query) use ($idFieldToCalculateAverage) {
                $query->select('id')->from('field_child')->where('id_field', $idFieldToCalculateAverage);
            })->get();
            
            $commentCount = $comments->count();
            $totalStars = $comments->sum('star');
            
            if ($comments->isNotEmpty()) {
                $averageStars = number_format($totalStars / $commentCount, 1);
            } else {
                $averageStars = 0;
            }
            $averageStarsByField[$field->id] = $averageStars;
            
            // Lấy giá trị price tối thiểu và tối đa
            $priceStats = FieldChild::where('id_field', $idFieldToCalculateAverage)
                ->selectRaw('MIN(price) as minPrice, MAX(price) as maxPrice')
                ->first();
        
            $minPrice = $priceStats->minPrice;
            $maxPrice = $priceStats->maxPrice;
        
            $priceByField[$field->id] = [
                'min' => $minPrice,
                'max' => $maxPrice,
            ];
        }
        
        return view('client.fields.index', [
            'fields' => $fields, 
            'averageStars' => $averageStarsByField,
            'priceByField' => $priceByField,
        ]);
    }
    public function detail(Request $request)
    {
        $id = $request->input('id');
        $field = Field::find($id);
        $user = User::where('username', $field->username)->first();
        $fieldChilds = FieldChild::where('id_field', $id)->get();
        $priceByField = [];
        $priceStats = FieldChild::where('id_field', $id)
        ->selectRaw('MIN(price) as minPrice, MAX(price) as maxPrice')
        ->first();

        $minPrice = $priceStats->minPrice;
        $maxPrice = $priceStats->maxPrice;

        $priceByField[$field->id] = [
            'min' => $minPrice,
            'max' => $maxPrice,
        ];
        $fieldImages = FieldImage::where('id_field', $id)->get();
        $imageUrls = Image::whereIn('id', $fieldImages->pluck('id_image'))->get();

        $comments = Comment::whereIn('id_field_child', $fieldChilds->pluck('id'))->get();
        $commentCount = $comments->count();
        $totalStars = $comments->sum('star');
        $averageStars = $commentCount > 0 ? number_format($totalStars / $commentCount, 1) : 0;

        $commentImages = CommentImage::whereIn('id_comment', $comments->pluck('id'))->get();
        $user2 = User::whereIn('username', $comments->pluck('username'))->get();

        $averageStars2 = [];
        foreach ($fieldChilds as $fieldChild) {
            $comments2 = Comment::whereIn('id_field_child', [$fieldChild->id])->get();
            $commentCount2 = $comments2->count();
            $totalStars2 = $comments2->sum('star');
            $averageStars2[$fieldChild->id] = $commentCount2 > 0 ? number_format($totalStars2 / $commentCount2, 1) : 0;
        }

        return view('client.fields.detail', [
            'field' => $field,
            'user' => $user,
            'fieldChilds' => $fieldChilds,
            'fieldImages' => $fieldImages,
            'imageUrls' => $imageUrls,
            'comments' => $comments,
            'user2' => $user2,
            'commentImages' => $commentImages,
            'imageUrls2' => Image::whereIn('id', $commentImages->pluck('id_image'))->get(),
            'averageStars' => $averageStars,
            'averageStars2' => $averageStars2,
            'commentCount' => $commentCount,
            'priceByField' => $priceByField,
        ]);

    }
    
}

