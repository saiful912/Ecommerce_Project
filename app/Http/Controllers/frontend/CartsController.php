<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Product;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CartsController extends Controller
{
    public function index()
    {

        return view('frontend.cart');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id'=>'required',
        ],[
            'product_id.required'=>'please give a product'
        ]);

        if (Auth::check()){
            $cart=Cart::where('user_id',Auth::id())->where('product_id',$request->product_id)->where('order_id', NULL)->first();
        }else{
            $cart=Cart::where('ip_address',request()->ip())->where('product_id',$request->product_id)->where('order_id', NULL)->first();
        }


        if (!is_null($cart)){
            $cart->increment('product_quantity');
        }else{
            $cart= new Cart();
            if (Auth::check()){
                $cart->user_id=Auth::id();
            }
            $cart->ip_address=request()->ip();
            $cart->product_id=$request->product_id;
            $cart->save();

        }
        return json_encode(['status' => 'success', 'Message' => 'Item added to cart', 'totalItems'=>Cart::totalItems()]);
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        if (!is_null($cart)) {
            $cart->product_quantity = $request->product_quantity;
            $cart->save();
        } else {
            return redirect()->route('carts');
        }

        $this->setSuccessMessage('Cart item has updated Successfully');
        return back();
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);
        if (!is_null($cart)) {
            $cart->delete();
        } else {
            return redirect()->route('carts');
        }
        $this->setSuccessMessage('Cart Item Has Deleted Successfully');
        return back();
    }
}
