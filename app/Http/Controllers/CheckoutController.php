<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use CodeCommerce\Order;
use Illuminate\Support\Facades\Auth;
use CodeCommerce\Category;
use CodeCommerce\Events\CheckoutEvent;

class CheckoutController extends Controller {
    /* public function __construct() {
      $this->middleware('auth');
      } */

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

            //chamando o event para email de confirmação de compra
            event(new CheckoutEvent(Auth::user(), $order));

            //limpando o carrinho de compras
            $cart->clear();

            //retornando para a view
            return view('store.checkout', compact('order', 'cart'));

            //$clear = Session::forget('cart');
        } else {
            return view('store.checkout', ['cart' => 'empty']);
        }
    }

}
