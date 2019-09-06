<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutsController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('priority', 'asc')->get();
        return view('frontend.checkouts', compact('payments'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone_no' => 'required',
            'shipping_address' => 'required',
            'payment_method_id' => 'required',
        ]);
        $order = new Order();
        //Check Transaction Id
        if ($request->payment_method_id != 'cash_in') {
            if ($request->transaction_id == NULL || empty($request->transaction_id)) {
                $this->setErrorMessage('Please given transaction ID');
                return back();
            }
        }
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone_no = $request->phone_no;
        $order->shipping_address = $request->shipping_address;
        $order->message = $request->message;
        $order->ip_address = request()->ip();
        $order->transaction_id = $request->transaction_id;
        if (Auth::check()) {
            $order->user_id =Auth::id();
        }
        $order->payment_id = Payment::where('short_name', $request->payment_method_id)->first()->id;
        $order->save();

        foreach (Cart::totalCarts() as $cart) {
            $cart->order_id = $order->id;
            $cart->save();
        }
        $this->setSuccessMessage('Your order has taken successfully !!! Please wait admin will soon confirm it.');
        return redirect()->route('home');
    }
}
