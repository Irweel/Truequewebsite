<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Product;



class ProductsController extends Controller
{
    public function addProduct(Request $request) {
        return view('products.add_product');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'Categoria' => 'required',
            'despripcion' => 'required|string|min:20',
        ]);
    }
    protected function create(array $data)
    {
        return Product::create([
            'title' => $data['title'],
            'image' => $data['image'],
            'descripcion' => $data['status'],
        ]);
        $products->save();
    }
}
    
    //
