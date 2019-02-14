<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Product;
use App\User;
use Image;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->get('name');
        $products = Product::orderBy('id', 'DESC')
        ->name($name)
        ->paginate();
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
        //Create Image
        if($request->hasFile('image')){
          $dir = 'uploads/productos/';
          $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
          $fileName = str_random() . '.' . $extension; // rename image
          $request->file('image')->move($dir, $fileName);
          $products->image = $fileName;
        }
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
        //Update Image

        if ($request->hasFile('image')) {
        $dir = 'uploads/productos/';
        if ($products->image != '' && File::exists($dir . $products->image))
        File::delete($dir . $products->image);
        $extension = strtolower($request->file('image')->getClientOriginalExtension());
        $fileName = str_random() . '.' . $extension;
        $request->file('image')->move($dir, $fileName);
        $products->image = $fileName;
        } elseif ($request->remove == 1 && File::exists('uploads/productos/' . $image->image)) {
        File::delete('uploads/productos/' . $products->post_image);
        $products->image = null;
        }
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
