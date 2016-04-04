<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Product;
use CodeCommerce\Category;

class AdminProductsController extends Controller {

    private $productModel;

    public function __construct(Product $productModel) {
        $this->productModel = $productModel;
    }

    public function index() {
        $values = $this->productModel->orderby('id', 'desc')->paginate(10);
        return view('products.index', compact('values'));
    }

    public function create(Category $category) {
        $categories = $category->lists('name', 'id');
        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request) {
        $input = $request->all();
        $product = $this->productModel->fill($input);
        $product->save();
        return redirect()->route('products');
    }

    public function destroy($id) {
        $this->productModel->find($id)->delete();
        return redirect()->route('products');
    }

    public function edit($id, Category $category) {
        $value = $this->productModel->find($id);
        $categories = $category->lists('name', 'id');
        return view('products.edit', compact('value', 'categories'));
    }

    public function update(ProductRequest $request, $id) {
        $this->productModel->find($id)->update($request->all());
        return redirect()->route('products');
    }

}
