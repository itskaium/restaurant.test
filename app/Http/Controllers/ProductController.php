<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        // $category = Category::all();
        $products = Product::all();
        return view('manager.product.index', compact('products'));
    }

    public function create()
    {
        $category = Category::all();
        return view('manager.product.create', compact('category'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);

        $product = new Product();

        $product->title = $request->title;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->image = $request->image;
        $product->description = $request->description;
        $product->save();

        return redirect('/products');
    }
}
