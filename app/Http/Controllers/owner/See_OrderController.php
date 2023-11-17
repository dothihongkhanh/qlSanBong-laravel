<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Support\Facades\DB;

class See_OrderController extends Controller
{
    public function index()
    {
        $user = null;
        $confirmed_Order = null;
        $confirm_Order = null;

        if (session()->has('username')) {
            $username = session('username');
            $user = User::where('username', $username)->first();
            $distinctOrders = Order::select('order.*', 'field.name_field')
                ->join('order_detail', 'order.id', '=', 'order_detail.id_order')
                ->join('field_child', 'order_detail.id_field_child', '=', 'field_child.id')
                ->join('field', 'field_child.id_field', '=', 'field.id')
                ->where('field.username', $username)
                ->distinct()
                ->get();
        }

        return view('owner.order.see_order', [
            'user' => $user,
            'distinctOrders' => $distinctOrders,
            'confirmed_Order' => $confirmed_Order,
        ]);
    }

    public function detail(Request $request)
    {
        $id = $request->input('id');

        $orderDetails = Order_detail::select(
            'order_detail.id',
            'order_detail.status',
            'order_detail.time_order',
            'field_child.name_field_child',
            'order_detail.time_start',
            'order_detail.time_end',
            \DB::raw('(order_detail.time_end - order_detail.time_start)/10000 as time'),
            \DB::raw('(order_detail.time_end - order_detail.time_start)/10000*field_child.price as thanh_toan')
        )
            ->join('order', 'order.id', '=', 'order_detail.id_order')
            ->join('field_child', 'field_child.id', '=', 'order_detail.id_field_child')
            ->join('field', 'field.id', '=', 'field_child.id_field')
            ->where('order.id', $id)
            ->get();
        $countOrder = $orderDetails->count('id');
        $totalMoney = $orderDetails->sum('thanh_toan');
        $stillInDebt = $totalMoney;
        $payMoney = 0;
        foreach ($orderDetails as $orderDetail) {
            if ($orderDetail->status == 'Đã xác nhận' || $orderDetail->status == 'Xác nhận') {
                $payMoney += $orderDetail->thanh_toan;
                $stillInDebt -= $orderDetail->thanh_toan;
            }
        }

        return view('owner.order.see_order_detail', [
            'orderDetails' => $orderDetails,
            'payMoney' => $payMoney,
            'stillInDebt' => $stillInDebt,
            'totalMoney' => $totalMoney,
            'countOrder' => $countOrder,
        ]);
    }

    public function confirmOrder($id)
    {
        $orderDetail = Order_detail::find($id);

        if (!$orderDetail) {
            return redirect()->back()->with('error', 'Order detail not found.');
        }
        $orderDetail->status = 'Xác nhận';
        $orderDetail->save();

        // Redirect back to the profile page or wherever you want
        return redirect()->back()->with('success', 'Order confirmed successfully.');
    }
}
