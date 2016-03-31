<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Product;

class AdminProductsController extends Controller {

    private $productModel;

    public function __construct(Product $productModel) {
        $this->productModel = $productModel;
    }

    public function index() {
        $values = $this->productModel->all();
        return view('products.index', compact('values'));
    }

    public function create() {
        return view('products.create');
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

    public function edit($id) {
        $value = $this->productModel->find($id);
        return view('products.edit', compact('value'));
    }
    
    public function update(ProductRequest $request, $id){
        $this->productModel->find($id)->update($request->all());
        return redirect()->route('products');
    }

}
