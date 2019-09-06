<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;


class AdminProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function product_create()
    {
        return view('backend.pages.product.create');
    }

    public function manage_products()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('backend.pages.product.index')->with('products', $products);
    }

    public function product_store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|max:150',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required',
            'brand_id' => 'required'
        ]);

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->slug = str_slug($request->title);
        $product->category_id =$request->category_id;
        $product->brand_id = $request->brand_id;
        $product->save();

        //ProductImage Model insert image
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/products/' . $img);
            Image::make($image)->save($location);

            $product_image = new ProductImage;
            $product_image->product_id = $product->id;
            $product_image->image = $img;
            $product_image->save();
        }
        session()->flash('success', 'product created successfully!');
        return redirect()->route('admin.product.create');
    }

    public function products_edit($id)
    {
        $product = Product::find($id);
        return view('backend.pages.product.edit')->with('product', $product);
    }

    public function product_update($id,Request $request)
    {
        $request->validate([
            'title' => 'required|max:150',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required',
            'brand_id' => 'required'
        ]);

        $product =Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();

        session()->flash('success', 'product updated successfully!');
        return redirect()->route('admin.products');
    }

    public function product_delete($id)
    {
        $product=Product::find($id);
        if (!is_null($product)){
            $product->delete();
        }
        session()->flash('success','Product has been deleted Successfully');
        return back();
    }
}
