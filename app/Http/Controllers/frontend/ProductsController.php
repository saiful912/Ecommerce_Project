<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(9);
        return view('frontend.pages.products.index')->with('products', $products);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (!is_null($product)) {
            return view('frontend.pages.products.show_products', compact('product'));
        } else {
            session()->flash('errors', 'Sorry || There is no product by this url..');
            return redirect()->route('products');
        }
    }


}
