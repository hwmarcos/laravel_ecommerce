<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use CodeCommerce\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function place(Order $order) {
        if (!Session::has('cart')) {
            return false;
        }
        $cart = Session::get('cart');
        if ($cart->getTotal() > 0) {
            $order = $order->create([
                'user_id' => Auth::user()->id,
                'total' => $cart->getTotal()
            ]);
            foreach ($cart->all() as $key => $item) {
                $order->items()->create([
                    'product_id' => $key,
                    'qtd' => $item['qtd'],
                    'price' => $item['price']
                ]);
            }           
            $clear = Session::forget('cart');            
            return view('store.order_success');
        } else {
            echo 'vazio';
        }
    }

}
