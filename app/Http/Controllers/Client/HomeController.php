<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\FieldChild;
use App\Models\Comment;
use App\Models\User;
use App\Models\User_permission;
use App\Models\District;
use App\Models\SubDistrict;

class HomeController extends Controller
{
    public function index()
    {
        $fields = Field::all(); // Lấy tất cả dữ liệu từ bảng Fields
        $owner = User_permission::where('id_permission', 2)->count();
        $client = User_permission::where('id_permission', 3)->count();
        $fieldCount =Field::count();
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
        $districts = District::all();
        $subDistricts = SubDistrict::all();
        
        return view('client.home.index', [
            'fields' => $fields, 
            'averageStars' => $averageStarsByField,
            'priceByField' => $priceByField,
            'owner' => $owner,
            'client' => $client,
            'fieldCount' => $fieldCount,
            'districts' => $districts,
            'subDistricts' => $subDistricts, 
        ]);
        
    }
    
}
