<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //direct view order list page
    public function orderList()
    {
        $orders = Order::select('orders.*', 'users.name as user_name')
            ->when(request('searchkey'), function ($queryforsearch) {
                $queryforsearch->orwhere('orders.created_at', 'like', '%' . request('searchkey') . '%')
                    ->orWhere('users.name', 'like', '%' . request('searchkey') . '%')
                    ->orWhere('orders.id', 'like', '%' . request('searchkey') . '%');
            })
            ->leftJoin('users', 'users.id', 'orders.user_id')
            ->orderBy('created_at', 'desc')
            ->paginate('10');
        // dd($orders->toArray());
        return view('admin.order.orderlist', compact('orders'));
    }

    // search order by status
    public function searchByStatus(Request $request)
    {
        // dd($request->toArray());
        $orders = Order::select('orders.*', 'users.name as user_name')
            ->leftJoin('users', 'users.id', 'orders.user_id')
            ->orderBy('created_at', 'desc');

        if ($request->orderstatus == null) {
            $orders = $orders->paginate('10');
        } else {
            $orders = $orders->where('orders.status', $request->orderstatus)->paginate('10');
        }

        return view('admin.order.orderlist', compact('orders'));
    }

    // change status of order status by admin
    public function ajaxStatusChange(Request $request)
    {
        // logger($request->all());
        Order::where('id', $request->orderId)->update(['status' => $request->status]);
    }
}
