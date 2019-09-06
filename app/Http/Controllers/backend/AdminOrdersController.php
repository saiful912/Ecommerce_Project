<?php

namespace App\Http\Controllers\backend;

use App\Models\Order;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('backend.pages.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        $order->is_seen_by_admin = 1;
        $order->save();
        return view('backend.pages.order.show', compact('order'));
    }

    public function completed($id)
    {
        $order = Order::find($id);
        if ($order->is_completed) {
            $order->is_completed = 0;
        } else {
            $order->is_completed = 1;
        }
        $order->save();
       session()->flash('success','Order Completed status change!!');
        return back();
    }

    public function paid($id)
    {
        $order=Order::find($id);
        if ($order->is_paid) {
            $order->is_paid = 0;
        } else {
            $order->is_paid = 1;
        }
        $order->save();
        session()->flash('success','Order Completed status change!!');
        return back();
    }

    public function chargeUpdate(Request $request,$id)
    {
        $order=Order::find($id);
        $order->shipping_charge=$request->shipping_charge;
        $order->custom_discount=$request->custom_discount;
        $order->save();
        session()->flash('success','Order charge and Discount has Change!!');
        return back();
    }

    public function generateInvoice($id)
    {
        $order=Order::find($id);
        $pdf=PDF::loadView('backend.pages.order.invoice', compact('order'));
        return $pdf->stream('invoice.pdf');
    }

    public function delete($id)
    {
        $order=Order::find($id);
        if (!is_null($order)){
            $order->delete();
        }else{
            return back();
        }
        session()->flash('success','order Deleted');
        return back();
    }
}
