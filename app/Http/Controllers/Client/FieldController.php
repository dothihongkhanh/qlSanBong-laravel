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
use App\Models\District;
use App\Models\SubDistrict;

use App\Models\Order_detail;

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
        $districts = District::all();
        $subDistricts = SubDistrict::all();

        return view('client.fields.index', [
            'fields' => $fields, 
            'averageStars' => $averageStarsByField,
            'priceByField' => $priceByField,
            'districts' => $districts,
            'subDistricts' => $subDistricts,
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

        $times = []; // Khai báo mảng times ở đây

        foreach ($fieldChilds as $fieldChild) {
            $orderDate = request('order_date');
            // Chuyển đổi ngày từ định dạng 'd/m/Y' sang 'Y-m-d'
            $orderDateFormatted = date('Y-m-d', ($orderDate));

            $orderDetails = Order_detail::where('id_field_child', $fieldChild->id)
                ->where('time_order', $orderDateFormatted)
                ->get();

    
            $times[$fieldChild->id] = []; // Khai báo mảng thời gian cho fieldChild hiện tại
            
            // Lặp qua từng bản ghi Order_detail và lấy giá trị time_start và time_end
            foreach ($orderDetails as $orderDetail) {
                $time_start = $orderDetail->time_start;
                $time_end = $orderDetail->time_end;

                // Thêm giá trị time_start và time_end vào mảng thời gian của fieldChild hiện tại
                $times[$fieldChild->id][] = [
                    'time_start' => $time_start,
                    'time_end' => $time_end,
                ];
            }    
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

            'times' => $times, // Pass the order details to the view
        ]);
    }
    public function busy(Request $request)
    {
        $times2 = [];
        $id = $request->input('id');
        $field = Field::find($id);
        $fieldChilds = FieldChild::where('id_field', $id)->get();

        foreach ($fieldChilds as $fieldChild) {
            $orderDate = request('order_date');
            // Chuyển đổi ngày từ định dạng 'd/m/Y' sang 'Y-m-d'
            $orderDateTimestamp = strtotime($orderDate);
            if ($orderDateTimestamp === false) {
                // Xử lý lỗi nếu $orderDate không hợp lệ
            } else {
                $orderDateFormatted = date('Y-m-d', $orderDateTimestamp);
                $orderDetails = Order_detail::where('id_field_child', $fieldChild->id)
                    ->where('time_order', $orderDateFormatted)
                    ->get();

                $times2[$fieldChild->id] = []; // Khai báo mảng thời gian cho fieldChild hiện tại
                // Lặp qua từng bản ghi Order_detail và lấy giá trị time_start và time_end
                foreach ($orderDetails as $orderDetail) {
                    $time_start = $orderDetail->time_start;
                    $time_end = $orderDetail->time_end;

                    // Thêm giá trị time_start và time_end vào mảng thời gian của fieldChild hiện tại
                    $times2[$fieldChild->id][] = [
                        'time_start' => $time_start,
                        'time_end' => $time_end,
                    ];
                }
            }
        }
        return redirect()
            ->route('client.fields.detail', ['id' => $id])
            ->with([
                'orderDateFormatted' => $orderDateFormatted, 
                'times2' => $times2
            ]);
    }
}

