<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = null;
        $confirmed_Order = null;
        $confirm_Order = null;

        if (session()->has('username')) {
            $username = session('username');
            $user = User::where('username', $username)->first();

            $confirmed_Order = Order_detail::select(
                'order_detail.time_order',
                'field.name_field',
                'field_child.name_field_child',
                'order_detail.time_start',
                'order_detail.time_end',
                \DB::raw('(order_detail.time_end - order_detail.time_start) / 10000 * field_child.price as thanh_toan')
            )
                ->join('order', 'order.id', '=', 'order_detail.id_order')
                ->join('user', 'user.username', '=', 'order.username')
                ->join('field_child', 'field_child.id', '=', 'order_detail.id_field_child')
                ->join('field', 'field.id', '=', 'field_child.id_field')
                ->where('user.username', $username)
                ->where('order_detail.status', 'Đã xác nhận')
                ->get();

                $confirm_Order = Order_detail::select(
                    'order_detail.id',
                    'order_detail.time_order',
                    'field.name_field',
                    'field_child.name_field_child',
                    'order_detail.time_start',
                    'order_detail.time_end',
                    'order_detail.status',
                    \DB::raw('(order_detail.time_end - order_detail.time_start) / 10000 * field_child.price as thanh_toan')
                )
                    ->join('order', 'order.id', '=', 'order_detail.id_order')
                    ->join('user', 'user.username', '=', 'order.username')
                    ->join('field_child', 'field_child.id', '=', 'order_detail.id_field_child')
                    ->join('field', 'field.id', '=', 'field_child.id_field')
                    ->where('user.username', $username)
                    ->where(function ($query) {
                        $query->where('order_detail.status', 'Xác nhận')
                              ->orWhere('order_detail.status', 'Chờ xác nhận');
                    })
                    ->get();
        }
        
        return view('client.profile.index', [
            'user' => $user,
            'confirm_Order' => $confirm_Order,
            'confirmed_Order' => $confirmed_Order,
        ]);
    }
        // ProfileController.php
    public function confirmOrder($id)
    {
        $orderDetail = Order_detail::find($id);

        if (!$orderDetail) {
            return redirect()->back()->with('error', 'Order detail not found.');
        }
        $orderDetail->status = 'Đã xác nhận';
        $orderDetail->save();

        // Redirect back to the profile page or wherever you want
        return redirect()->back()->with('success', 'Order confirmed successfully.');
    }

}
