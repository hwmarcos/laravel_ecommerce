<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests\CategoryRequest;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;

class CategoriesController extends Controller {

    private $categoryModel;

    public function __construct(Category $categoryModel) {
        $this->categoryModel = $categoryModel;
    }

    public function index() {
         $values = $this->categoryModel->orderby('id', 'desc')->paginate(10);
        return view('categories.index', compact('values'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store(CategoryRequest $request) {
        $input = $request->all();
        $category = $this->categoryModel->fill($input);
        $category->save();
        return redirect()->route('categories');
    }

    public function destroy($id) {
        $this->categoryModel->find($id)->delete();
        return redirect()->route('categories');
    }

    public function edit($id) {
        $value = $this->categoryModel->find($id);
        return view('categories.edit', compact('value'));
    }
    
    public function update(CategoryRequest $request, $id){
        $this->categoryModel->find($id)->update($request->all());
        return redirect()->route('categories');
    }

}
