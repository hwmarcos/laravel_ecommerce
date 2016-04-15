<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;

class StoreController extends Controller {

    public function index() {
        $categories = Category::all();
        $featured = Product::featured();
        $recommend = Product::recommended();
        return view('store.index', compact('categories', 'featured', 'recommend'));
    }

    public function category($category_id) {
        $categories = Category::all();
        $category = Category::find($category_id);
        $products = Product::ofCategory($category_id);
        return view('store.category', compact('categories', 'category', 'products'));
    }

    public function product($product_id) {
        $categories = Category::all();
        $product = Product::find($product_id);
        return view('store.product', compact('categories', 'product'));
    }

    public function tag($tag_id) {
        $categories = Category::all();
        $tag = Tag::find($tag_id);
        $products = Tag::find($tag_id)->products()->get();
        return view('store.tag', compact('categories', 'tag', 'products'));
    }

}
