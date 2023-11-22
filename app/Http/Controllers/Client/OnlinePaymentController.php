<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OnlinePaymentController extends Controller
{
    public function vnpay_payment(Request $request)
    {
        // Lấy dữ liệu từ request
        $data = $request->all();

        // Kiểm tra xem 'total' có tồn tại trong dữ liệu không
        if ($request->has('total')) {
            // Bắt đầu một giao dịch cơ sở dữ liệu
            DB::beginTransaction();

            try {
                // Tạo một đối tượng Order và lưu vào cơ sở dữ liệu
                $order = new Order();
                $order->username = session('username'); // Giả sử bạn có một phiên đăng nhập người dùng
                $order->time_create = now();
                $order->status = 'Đã thanh toán'; // Chưa thanh toán vì chưa nhấn nút thanh toán VNPAY
                $order->save();

                // Lấy ID của đơn đặt hàng
                $orderId = $order->id;

               // Lưu thông tin đặt sân vào bảng order_detail
            if ($request->has('bookingData')) {
                // Decode dữ liệu JSON
                $bookingData = json_decode(urldecode($request->input('bookingData')), true);

                // Lặp qua dữ liệu đặt sân và tạo các chi tiết đơn đặt hàng
                foreach ($bookingData as $booking) {
                    $orderDetail = new OrderDetail();
                    $orderDetail->id_order = $orderId;
                    $orderDetail->id_field_child = $booking['loaiSan'];
                    $orderDetail->time_start = $booking['gioBatDau'];
                    $orderDetail->time_end = $booking['gioKetThuc'];
                    $orderDetail->time_order = $booking['ngayDat'];
                    $orderDetail->note = '';
                    $orderDetail->status = 'Chờ xác nhận';
                    $orderDetail->save();
                }
            }

                // Commit giao dịch cơ sở dữ liệu
                DB::commit();

                // Tiếp tục xử lý thanh toán và chuyển hướng đến trang thanh toán VNPAY
                return $this->redirectToVnpay($orderId, $data['total']);
            } catch (\Exception $e) {
                // Nếu có lỗi, rollback giao dịch cơ sở dữ liệu
                DB::rollBack();

                // Redirect về trang trước với thông báo lỗi
                return redirect()->back()->with('error', 'Có lỗi xảy ra trong quá trình xử lý đặt sân. Vui lòng thử lại.');
            }
        } else {
            // Redirect về trang trước với thông báo lỗi
            return redirect()->back()->with('error', 'Dữ liệu không hợp lệ.');
        }
    }

    // Hàm thực hiện thanh toán VNPAY và chuyển hướng
    private function redirectToVnpay($orderId, $totalAmount)
    {
        // Lấy các thông tin cần thiết cho thanh toán VNPAY
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/payment_succsess";
        $vnp_TmnCode = "CGXZLS0Z"; // Mã website tại VNPAY 
        $vnp_HashSecret = "XNBCJFAKAZQSGTARRLGCHVZWCIOIGSHN"; // Chuỗi bí mật

        $vnp_TxnRef = $orderId; // Mã đơn hàng
        $vnp_OrderInfo = 'Thanh toán đơn đặt sân'; // Thông tin đơn hàng
        $vnp_OrderType = 'xtmn'; // Loại đơn hàng
        $vnp_Amount = $totalAmount * 100; // Số tiền cần thanh toán
        $vnp_Locale = 'VN'; // Ngôn ngữ
        $vnp_BankCode = 'NCB'; // Mã ngân hàng (nếu có)
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        // Xây dựng dữ liệu thanh toán
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        // Sắp xếp mảng theo key
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;

        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret); 
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        // Chuyển hướng đến trang thanh toán VNPAY
        return redirect()->away($vnp_Url);
    }

}
