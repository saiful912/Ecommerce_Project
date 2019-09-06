<?php

namespace App\Http\Controllers\frontend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerificationController extends Controller
{
    public function verify($token)
    {
        $user = User::where('remember_token', $token)->first();
        if (!is_null($user)) {
            $user->status = 1;
            $user->remember_token = null;
            $user->save();
            $this->setSuccessMessage('You are registered successfully !! Login Now');
            return redirect('login');
        } else {
            $this->setErrorMessage('Sorry !! Your token is not matched !!');
            return redirect('/');
        }
    }
}
