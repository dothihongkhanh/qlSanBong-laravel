<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\FieldChild;
use App\Models\Comment;
use App\Models\User;
use App\Models\UserPermission;
use App\Models\District;
use App\Models\SubDistrict;

class HomeController extends Controller
{
    public function index()
    {   $id_permission = 0;

        if (session()->has('username')) {
            $username = session('username');
            $user = User::where('username', $username)->first();
        
            if ($user) {
                $userPermission = UserPermission::where('username', $user->username)->first();
        
                if ($userPermission) {
                    $id_permission = $userPermission->id_permission;
                } else {
                    // Handle the case where user permission is not found
                }
            } else {
                // Handle the case where user is not found
            }
        }
        if ($id_permission==2) {
            return redirect()->route('owner_home');
        } else {
            $fields = Field::all(); // Lấy tất cả dữ liệu từ bảng Fields
            $owner = UserPermission::where('id_permission', 2)->count();
            $client = UserPermission::where('id_permission', 3)->count();
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
    public function filterFields(Request $request)
    {
        $subDistrict = $request->input('sub_district');
        $owner = UserPermission::where('id_permission', 2)->count();
        $client = UserPermission::where('id_permission', 3)->count();
        $fieldCount =Field::count();
        $subDistrict1 = SubDistrict::where('id', $subDistrict)->get();
        $date = $request->input('date');
        $startTime = $request->input('start_Time');
        $endTime = $request->input('end_Time');
        $priceRange = $request->input('priceRange');
        if ($subDistrict=='Phường') {            
            $subDistrict1 = null;
            if ($startTime =='') {
                $fields = Field::select('field.*')
                ->join('field_child', 'field.id', '=', 'field_child.id_field')
                ->join('sub_district', 'field.id_sub_district', '=', 'sub_district.id')
                ->where('field_child.price', '<=', $priceRange)
                ->distinct()
                ->get();
            } else {       
                $remove_fields = DB::table('field')
                ->select('field.id')
                ->join('field_child', 'field.id', '=', 'field_child.id_field')
                ->join('sub_district', 'field.id_sub_district', '=', 'sub_district.id')
                ->join('order_detail', function ($join) use ($startTime, $endTime) {
                    $join->on('field_child.id', '=', 'order_detail.id_field_child')
                        ->where(function ($query) use ($startTime, $endTime) {
                            $query->whereRaw('TIME(?) >= order_detail.time_start', [$startTime])
                                ->whereRaw('TIME(?) <= order_detail.time_end', [$startTime])
                                ->orWhere(function ($query) use ($endTime) {
                                    $query->whereRaw('TIME(?) >= order_detail.time_start', [$endTime])
                                        ->whereRaw('TIME(?) <= order_detail.time_end', [$endTime]);
                                });
                        });
                })
                ->where('field.time_open', '<=', $startTime)
                ->where('field.time_close', '>=', $startTime)                
                ->where('order_detail.time_order', '=', $date)
                ->distinct()
                ->get();

            $remove_field_ids = collect($remove_fields)->pluck('id')->toArray();

            $fields = Field::select('field.*')
                ->join('field_child', 'field.id', '=', 'field_child.id_field')
                ->join('sub_district', 'field.id_sub_district', '=', 'sub_district.id')
                ->where('field_child.price', '<=', $priceRange)
                ->whereNotIn('field.id', $remove_field_ids)
                ->distinct()
                ->get();
            }
    
        } else {            
            $subDistrict1 = SubDistrict::where('id', $subDistrict)->get();
            if ($startTime =='') {
                $fields = Field::select('field.*')
                ->join('field_child', 'field.id', '=', 'field_child.id_field')
                ->join('sub_district', 'field.id_sub_district', '=', 'sub_district.id')
                ->where('sub_district.id', $subDistrict)
                ->where('field_child.price', '<=', $priceRange)
                ->distinct()
                ->get();
            } else {
                $remove_fields = DB::table('field')
                ->select('field.id')
                ->join('field_child', 'field.id', '=', 'field_child.id_field')
                ->join('sub_district', 'field.id_sub_district', '=', 'sub_district.id')
                ->join('order_detail', function ($join) use ($startTime, $endTime) {
                    $join->on('field_child.id', '=', 'order_detail.id_field_child')
                        ->where(function ($query) use ($startTime, $endTime) {
                            $query->whereRaw('TIME(?) >= order_detail.time_start', [$startTime])
                                ->whereRaw('TIME(?) <= order_detail.time_end', [$startTime])
                                ->orWhere(function ($query) use ($endTime) {
                                    $query->whereRaw('TIME(?) >= order_detail.time_start', [$endTime])
                                        ->whereRaw('TIME(?) <= order_detail.time_end', [$endTime]);
                                });
                        });
                })
                ->where('field.time_open', '<=', $startTime)
                ->where('field.time_close', '>=', $startTime)           
                ->where('order_detail.time_order', '=', $date)
                ->distinct()
                ->get();
                    $fields = Field::select('field.*')
                    ->join('field_child', 'field.id', '=', 'field_child.id_field')
                    ->join('sub_district', 'field.id_sub_district', '=', 'sub_district.id')
                    ->where('sub_district.id', $subDistrict)
                    ->where('field_child.price', '<=', $priceRange)
                    ->distinct()
                    ->get();
                    $remove_field_ids = collect($remove_fields)->pluck('id')->toArray();

                    $fields = Field::select('field.*')
                    ->join('field_child', 'field.id', '=', 'field_child.id_field')
                    ->join('sub_district', 'field.id_sub_district', '=', 'sub_district.id')
                    ->where('sub_district.id', $subDistrict)
                    ->where('field_child.price', '<=', $priceRange)
                    ->whereNotIn('field.id', $remove_field_ids)
                    ->distinct()
                    ->get();            
            
            }
        }
        
    // Lấy tất cả dữ liệu từ bảng Fields
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
        $districts = District::all();
        $subDistricts = SubDistrict::all();

        return view('client.home.index', [
            'owner' => $owner,
            'client' => $client,
            'fieldCount' => $fieldCount,
            'fields' => $fields, 
            'averageStars' => $averageStarsByField,
            'priceByField' => $priceByField,
            'districts' => $districts,
            'subDistricts' => $subDistricts,
            'subDistrict1' => $subDistrict1,
            'date' => $date,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'priceRange' => $priceRange,
        ]);
    }
}
