<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;

class OrderController extends Controller {

    public function index() {
        $orders = Order::paginate(30);
        return view('orders.index', compact('orders'));
    }

    public function update($order_id, $status) {
        $order = Order::find($order_id);
        $order->status = $status;
        $order->save();
        return;
    }

}
