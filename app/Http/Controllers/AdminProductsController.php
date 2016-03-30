<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminProductsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $values = \CodeCommerce\Product::all();
        $buffer = null;
        foreach ($values as $val) {
            $buffer .= "<strong>Name:</strong> {$val->name}<br/>";
            $buffer .= "<strong>Description:</strong> {$val->description}<br/>";
            $buffer .= "<strong>Price:</strong> {$val->price}<hr/>";
        }
        echo $buffer;
    }
    
    public function create() {
        return 'products create';
    }

    public function store() {
        return 'products store';
    }

    public function destroy($id) {
       return 'products destroy';
    }

    public function edit($id) {
        return 'products edit';
    }
    
    public function update($id){
       return 'products update';
    }

}
