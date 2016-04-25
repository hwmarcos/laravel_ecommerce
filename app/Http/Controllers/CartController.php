<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Cart;
use CodeCommerce\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller {

    private $cart;

    /**
     * 
     * @param Cart $cart
     */
    public function __construct(Cart $cart) {
        $this->cart = $cart;
    }

    public function getCart() {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }
        return $cart;
    }

    public function index() {
        if (!Session::has('cart')) {
            Session::set('cart', $this->cart);
        }
        return view('store.cart', ['cart' => Session::get('cart')]);
    }

    public function add($id_product) {
        $cart = $this->getCart();
        $product = Product::find($id_product);
        $cart->add($id_product, $product->name, $product->price);
        Session::set('cart', $cart);
        return redirect()->route('store.cart');
    }

    public function update($id_product, $qtd) {
        $cart = $this->getCart();
        $cart->updateQtd($id_product, $qtd);
        Session::set('cart', $cart);
        return redirect()->route('store.cart');
    }

    public function destroy($id_product) {
        $cart = $this->getCart();
        $cart->remove($id_product);
        Session::set('cart', $cart);
        return redirect()->route('store.cart');
    }    

}
