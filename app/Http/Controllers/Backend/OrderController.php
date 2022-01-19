<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function manage_order()
    {
        $orders = Order::all();
        return view('backend.admin.order.manage_order', compact('orders'));
    }
}
