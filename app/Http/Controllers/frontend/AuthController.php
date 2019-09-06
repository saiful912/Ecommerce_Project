<?php

namespace App\Http\Controllers\frontend;

use App\Models\District;
use App\Models\Division;
use App\Notifications\VerifyRegistration;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        return view('frontend.pages.user.register', compact('divisions', 'districts'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process_register(Request $request)
    {
        //validation check
        // validation
        $validator = Validator::make(request()->all(), [
            'name' => 'required|unique:users,name',
            'phone_no' => 'required|min:6|max:14|unique:users,phone_no',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'address' => 'required',
            'division_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'image' => 'required|image',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image = $request->file('image');
        $file_name = uniqid('image_', true) . str_random(10) . '.' . $image->getClientOriginalExtension();
        if ($image->isValid()) {
            $image->storeAs('images', $file_name);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'phone_no' => $request->input('phone_no'),
            'email' => strtolower($request->input('email')),
            'address' => $request->input('address'),
            'division_id' => $request->input('division_id'),
            'district_id' => $request->input('district_id'),
            'image' => $request->input('image', $file_name),
            'password' => bcrypt($request->input('password')),
            'remember_token' => str_random(16),
            'status' => 0,
        ]);

        $user->notify(new VerifyRegistration($user));
        $this->setSuccessMessage('A confirmation email has sent to you.. Please check and confirm your email');
        return redirect()->route('register');
    }

    public function showLoginForm()
    {
        return view('frontend.pages.user.login');
    }

    public function process_login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        //Find User by this email
        $user = User::where('email', $request->email)->first();
        if ($user['status'] == 1) {
            //login this user
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password],
                $request->remember)) {
                // Log Him Now
                return redirect()->intended(route('profile'));
            } else {
                $this->setErrorMessage('Invalid Email Or Password');
                return back();
            }
        } else {
            // Send him a token again
            if (!is_null($user)) {
                $user->notify(new VerifyRegistration($user));
                $this->setSuccessMessage('A New confirmation email has sent to you.. Please check and confirm your email');
                return redirect('login');
            } else {
                $this->setErrorMessage('Please Register first !!');
                return redirect()->route('login');
            }
        }
    }

    public function profile_show()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        $user = Auth::user();
        return view('frontend.pages.user.profile', compact('user', 'districts', 'divisions'));
    }

    public function update_profile(Request $request)
    {
        $user = optional(auth()->user());
        $this->validate($request, [
            'name' => 'required',
            'phone_no' => 'required|min:6|max:14',
            'email' => 'required|email',
            'address' => 'required',
            'division_id' => 'required|numeric',
            'district_id' => 'required|numeric',
        ]);


        $inputs = $request->except(['_token']);
        $user->update($inputs);
        $this->setSuccessMessage('Profile updated.');

        return redirect()->back();
    }

    public function update_password(Request $request)
    {
        $user = optional(auth()->user());
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
        $credentials = [
            'email' => $user->email,
            'password' => $request->input('old_password'),
        ];

        if (auth()->attempt($credentials)) {
            $user->update([
                'password' => bcrypt($request->input('password')),
            ]);

            $this->setSuccessMessage('Password changed.');

            return redirect()->back();
        }

        $this->setErrorMessage('Old password is wrong.');

        return redirect()->back();
    }

    public function update_image(Request $request)
    {
        $request->validate([
            'image' => 'image'
        ]);
        $employee = User::where('id',Auth::user()->id)->first();

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
            $this->setSuccessMessage('image update');
            return redirect()->back();
        }else{
            $this->setErrorMessage('wrong');
            return redirect()->back();
        }
    }



    public function logout()
    {
        auth()->logout();
        $this->setSuccessMessage('User has been logged out.');

        return redirect()->route('login');
    }


}
