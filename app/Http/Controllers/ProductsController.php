<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Product;
use App\User;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate();
        return view('products.index', compact('products'));
    }

    public function menu() {
        $products = Product::orderBy('id', 'DESC')->paginate();
        return view('demo', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }

    public function store (ProductRequest $request)
    {
        $products = new Product;

        $products->name = $request->name;
        $products->short = $request->short;
        $products->body = $request->body;
        $products->user_id = $request->user_id = Auth::user()->id;
        $products->image = $request->image;
        $products->save();

        return redirect()->route('products.index')
                         ->with('info', 'El producto fue publicado');
    }

    public function edit($id)
    {
        $products = Product::find($id);
        return view('products.edit', compact('products'));
    }

    public function update (ProductRequest $request, $id)
    {
        $products = Product::find($id);

        $products->name = $request->name;
        $products->short = $request->short;
        $products->body = $request->body;
        $products->image = $request->image;
        $products->save();

        return redirect()->route('products.index')
                         ->with('info', 'El producto fue actualizado');
    }

    public function show($id)
    {
        $products = Product::find($id);
        return view('products.show', compact('products'));
    }

    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();

        return back()->with('info', 'El producto fue eliminado');
    }

    //public function addProduct(Request $request) {
    //    return view('products.add_product');
    //}
    //protected function validator(array $data)
    //{
    //    return Validator::make($data, [
    //        'title' => 'required|string|max:255',
    //        'Categoria' => 'required',
    //        'despripcion' => 'required|string|min:20',
    //    ]);
    // }
    // protected function create(array $data)
    // {
    //    return Product::create([
    //        'title' => $data['title'],
    //        'image' => $data['image'],
    //        'descripcion' => $data['status'],
    //    ]);
     //   $products->save();
    // }
}

    //
