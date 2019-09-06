<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function showHome()
    {
        $sliders=Slider::orderBy('priority','asc')->get();
        $products=Product::orderBy('id')->paginate(9);
        return view('frontend.home',compact('sliders','products'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::orWhere('title', 'like', '%' . $search . '%')
            ->orWhere('slug', 'like', '%' . $search . '%')
            ->orWhere('price', 'like', '%' . $search . '%')
            ->orWhere('quantity', 'like', '%' . $search . '%')
            ->orderBy('id', 'desc')->get();
        return view('frontend.pages.products.search', compact('products', 'search'));
    }

}
