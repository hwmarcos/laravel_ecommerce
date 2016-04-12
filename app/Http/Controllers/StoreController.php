<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;

class StoreController extends Controller {

    public function index() {
        $categories = Category::all();
        $featured = Product::featured();
        $recommend = Product::recommended();
        return view('store.index', compact('categories', 'featured', 'recommend'));
    }

    public function productList($category_id) {
        $categories = Category::all();
        $category = Category::find($category_id);
        $products = Product::where('category_id', '=', $category_id)->get();
        return view('store.products_list', compact('categories', 'products', 'category'));
    }

}
