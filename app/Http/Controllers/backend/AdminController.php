<?php

namespace App\Http\Controllers\backend;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('backend.pages.index', compact('orders'));
    }

    public function profile()
    {
        $admin = Auth::user('admin');
        return view('backend.pages.profile', compact('admin'));
    }

    public function update_profile(Request $request)
    {
        $admin = optional(auth()->user('admin'));
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required|min:6|max:14',
            'email' => 'required|email',
        ]);
        $inputs = $request->except(['_token']);
        $admin->update($inputs);
        session()->flash('success', 'Admin Update');
        return back();
    }

    public function update_password(Request $request)
    {
        $admin = optional(auth()->user('admin'));
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $credentials = [
            'email' => $admin->email,
            'password' => $request->input('old_password'),
        ];
        if (auth()->attempt($credentials)) {
            $admin->update([
                'password' => bcrypt($request->input('password')),
            ]);
            session()->flash('success', 'Password Changed');
            return back();
        }
        session()->flash('error', 'Old password is wrong.');
        return redirect()->back();
    }

    public function update_photo(Request $request)
    {
        $request->validate([
            'image' => 'image'
        ]);

        $employee = Admin::where('id',Auth::user('admin')->id)->first();
        if ($request->hasfile('image')){
            if (File::exists('uploads/images/' . $employee->image)) {
                File::delete('uploads/images/' . $employee->image);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = md5(time()).'.'.$extension;
            $file->storeAs('images',$filename);
            $employee->image=$filename;
        } else {
            return $request;
//            $employee->image='';
        }
        if($employee->save()){
            session()->flash('success','image update');
            return redirect()->back();
        }else{
            session()->flash('error','wrong');
            return redirect()->back();
        }
    }
}
