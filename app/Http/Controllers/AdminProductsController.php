<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Category;
use CodeCommerce\Http\Requests\ProductImageRequest;

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

    /*
     * IMAGES
     */

    public function images($product_id) {
        $product = $this->productModel->find($product_id);
        return view('products.images', compact('product'));
    }

    public function createImage($product_id) {
        $product = $this->productModel->find($product_id);
        return view('products.create_image', compact('product'));
    }

    public function storeImage(ProductImageRequest $request, $product_id, ProductImage $productImage) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = $productImage::create(['product_id' => $product_id, 'extension' => $extension]);
        Storage::disk('public_local')->put($image->id . '.' . $extension, File::get($file));
        return redirect()->route('products.images', ['id' => $product_id]);
    }

    public function destroyImage($image_id, ProductImage $productImage) {
        $image = $productImage->find($image_id);
        $product = $image->product;
        $img = $image->id . '.' . $image->extension;
        $filename = public_path('/uploads/') . $img;
        if (file_exists($filename)) {
            Storage::disk('public_local')->delete($img);
            $image->delete();
        }
        return redirect()->route('products.images', ['id' => $product->id]);
    }

}
