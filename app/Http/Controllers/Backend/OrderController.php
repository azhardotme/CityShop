<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function manage_order()
    {
        $orders = Order::all();
        return view('backend.admin.order.manage_order', compact('orders'));
    }

    public function view_order($id)
    {
        $orders = Order::where('orders.id', $id)->first();
        $order_by_id = OrderDetail::where('order_id', $id)->get();
        return view('backend.admin.order.view_order', compact(['orders', 'order_by_id']));
    }
}
