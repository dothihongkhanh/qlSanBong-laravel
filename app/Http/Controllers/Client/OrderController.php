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
    public function index(Request $request)
    {

        $bookingData = json_decode(urldecode($_GET['bookingData']), true);
        $fieldId = $_GET['id'];

        $this->saveOrder($request);

        // Thực hiện truy vấn vào cơ sở dữ liệu để lấy tên sân tương ứng
        $field = DB::table('field')->where('id', $fieldId)->first();

        // Kiểm tra xem có dữ liệu tìm thấy hay không
        if ($field) {
            $fieldName = $field->name_field;
            $fieldAddress = $field->address;
        } else {
            $fieldName = 'Sân không tồn tại'; // Hoặc giá trị mặc định khác nếu cần
        }

        $orders = []; // Tạo một mảng để lưu trữ thông tin đặt sân
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
            }

            $totalTime = date('H:i', strtotime($gioKetThuc) - strtotime($gioBatDau));
            $totalTimeInHours = (strtotime($gioKetThuc) - strtotime($gioBatDau)) / 3600;
            $totalAll += ($totalTimeInHours * $childFieldPrice);
            $deposit = $totalAll * 0.2;

            $orders[] = [
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
            ];
        }

        return view('client.payment.index', compact('orders', 'totalAll', 'deposit', 'fieldAddress'));
    }

    public function saveOrder(Request $request)
    {
        $bookingData = json_decode(urldecode($request->input('bookingData')), true);

        // Lưu thông tin đơn đặt hàng vào bảng "order"
        $order = new Order();
        $order->username = session('username');
        $order->time_create = now();
        $order->status = 'Chưa thanh toán'; // Hoặc giá trị khác tùy thuộc vào logic của bạn
        $order->save();
        // Lấy ID của đơn đặt hàng vừa được tạo
        $orderId = $order->id;

        if (!empty($bookingData) && is_array($bookingData)) {
            foreach ($bookingData as $booking) {
                $loaiSan = $booking['loaiSan']; // Lấy giá trị 'loaiSan' từ mảng $booking
                $ngayDat = $booking['ngayDat'];
                $gioBatDau = $booking['gioBatDau'];
                $gioKetThuc = $booking['gioKetThuc'];

                // Lưu thông tin đơn đặt hàng vào bảng "order_detail"
                $orderDetail = new OrderDetail();
                $orderDetail->id_order = $orderId;
                $orderDetail->id_field_child = $loaiSan;
                $orderDetail->time_start = $gioBatDau;
                $orderDetail->time_end = $gioKetThuc;
                $orderDetail->time_order = $ngayDat;
                $orderDetail->note = '';
                $orderDetail->status = 'Chờ xác nhận'; // Thay thế bằng ghi chú thực tế
                $orderDetail->save();
            }
        } else {
            // Handle the case when $bookingData is null or not an array
        }

        return redirect()->route('client.payment.success_payment');
    }


    public function success()
    {
        // Xử lý logic cho trang thành công

        // Trả về view của trang thành công
        return view('client.payment.success_payment');
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
