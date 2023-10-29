<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\FieldChild;
use App\Models\Comment;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $fields = Field::all(); // Lấy tất cả dữ liệu từ bảng Fields
        $averageStarsByField = []; // Mảng lưu trữ trung bình số sao cho từng sân
        $priceByField = []; // Mảng lưu trữ giá trị price tối thiểu và tối đa
        $user = User::count();
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
        
        return view('client.home.index', [
            'fields' => $fields, 
            'averageStars' => $averageStarsByField,
            'priceByField' => $priceByField,
            'user' => $user,
        ]);
        
    }
}
