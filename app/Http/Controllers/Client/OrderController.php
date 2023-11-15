<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\FieldChild;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookingData = json_decode(urldecode($_GET['bookingData']), true);

        // Lấy giá trị ID sân từ URL
        $fieldId = $_GET['id'];

        // Thực hiện truy vấn vào cơ sở dữ liệu để lấy tên sân tương ứng
        $field = DB::table('field')->where('id', $fieldId)->first();

        // Kiểm tra xem có dữ liệu tìm thấy hay không
        if ($field) {
            $fieldName = $field->name_field;
            $fieldAddress = $field->address;
        } else {
            $fieldName = 'Sân không tồn tại'; // Hoặc giá trị mặc định khác nếu cần
        }

        $totalAll = 0; // Biến để lưu tổng thành tiền

        foreach ($bookingData as $booking) {
            $loaiSan = $booking['loaiSan']; // Lấy giá trị 'loaiSan' từ mảng $booking
            $ngayDat = $booking['ngayDat'];
            $gioBatDau = $booking['gioBatDau'];
            $gioKetThuc = $booking['gioKetThuc'];           

            // Lấy thông tin của sân con từ cơ sở dữ liệu
            $fieldChild = FieldChild::find($loaiSan);

            if ($fieldChild) {
                $childFieldPrice = $fieldChild->price; // Giá của sân con
            } else {
                $childFieldPrice = 0; // Giá mặc định nếu không tìm thấy sân con
            }
        }

        $totalTime = date('H:i', strtotime($gioKetThuc) - strtotime($gioBatDau));
        $totalTimeInHours = (strtotime($gioKetThuc) - strtotime($gioBatDau)) / 3600;
        $totalAll += ($totalTimeInHours * $childFieldPrice);
        $deposit = $totalAll * 20 / 100;
        
        // Lưu thông tin đơn đặt hàng vào bảng "order"
        $order = new Order();
        $order->username = session('username');
        $order->time_create = now();
        $order->status = 'Chưa thanh toán'; // Hoặc giá trị khác tùy thuộc vào logic của bạn
        $order->save();

        // Lấy ID của đơn đặt hàng vừa được tạo
        $orderId = $order->id;

        // Lưu thông tin đơn đặt hàng vào bảng "order_detail"
        $orderDetail = new OrderDetail();
        $orderDetail->id_order = $orderId;
        $orderDetail->id_field_child = $loaiSan;
        $orderDetail->time_start = $gioBatDau;
        $orderDetail->time_end = $gioKetThuc;
        $orderDetail->time_order = now();
        $orderDetail->note = 'Ghi chú'; // Thay thế bằng ghi chú thực tế
        $orderDetail->save();

        return view('client.payment.index', [
            'fieldName' => $fieldName, 
            'totalAll' => $totalAll,
            'fieldAddress' => $fieldAddress,
            'childFieldPrice' => $childFieldPrice,
            'ngayDat' => $ngayDat,
            'gioBatDau' => $gioBatDau,
            'gioKetThuc' => $gioKetThuc,
            'totalTime' => $totalTime,
            'loaiSan' => $loaiSan,
            'deposit' => $deposit
        ]);
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
