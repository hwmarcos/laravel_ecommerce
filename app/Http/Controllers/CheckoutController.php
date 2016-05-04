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
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Purchases\Transactions\Locator;

class CheckoutController extends Controller {
    /* public function __construct() {
      $this->middleware('auth');
      } */

    public function place(Order $order, CheckoutService $checkoutService) {

        if (!Session::has('cart')) {
            return false;
        }
        $cart = Session::get('cart');
        if ($cart->getTotal() > 0) {
            $order = $order->create([
                'user_id' => Auth::user()->id,
                'total' => $cart->getTotal()
            ]);

            $checkout = $checkoutService->createCheckoutBuilder();

            foreach ($cart->all() as $key => $item) {

                $price = number_format($item['price'], 2, '.', '');
                $checkout->addItem(new Item($key, $item['name'], $price, $item['qtd']));

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

            /* echo '<pre>';
              var_dump($checkout->getCheckout());
              exit; */

            //enviando para a página do pagseguro
            $response = $checkoutService->checkout($checkout->getCheckout());
            return redirect($response->getRedirectionUrl());

            //retornando para a view
            //return view('store.checkout', compact('order', 'cart'));
            //$clear = Session::forget('cart');
        } else {
            return view('store.checkout', ['cart' => 'empty']);
        }
    }

    public function checkoutReturn(Request $request, Locator $locator, Order $order) {
        $transaction_code = $request->get('transaction_id');

        $transaction = $locator->getByCode($transaction_code);

        $status = $transaction->getDetails()->getStatus();

        $lastOrder = $order->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();

        $lastOrder->transaction_id = $transaction_code;
        $lastOrder->status = $status;

        $lastOrder->save();

        $cart = Session::get('cart');
        $cart = $cart->all();
        $order = $lastOrder;

        return view('store.checkout', compact('order', 'cart'));

        /* echo 'sucesso';

          echo '<pre>';
          var_dump($transaction_code, $transaction, $status, Auth::user()->id);
          exit; */
    }

    public function test(CheckoutService $checkoutService) {

        $checkout = $checkoutService->createCheckoutBuilder()
                ->addItem(new Item(1, 'Televisão LED 500', 8999.99))
                ->addItem(new Item(2, 'Video-game mega ultra blaster', 799.99))
                ->getCheckout();

        $response = $checkoutService->checkout($checkout);

        return redirect($response->getRedirectionUrl());
    }

}
