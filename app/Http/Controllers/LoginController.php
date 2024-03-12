<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        try {
            $this->middleware('guest')->except('logout');
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }
    
    public function login()
    {
        try {
            $setting = Setting::first();

            return view('authentication.login',compact('setting'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function authenticate(Request $request)
    {
        try {
            $email    = $request->email;
            $password = $request->password;
            $remember = $request->remember_token;
    
            if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1], $remember)) {
    
                return redirect()->intended('dashboard');
            }
            
            return redirect()->route('login')->with('errorcredentials','Credentials do not match or Account not active!');
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            return redirect()->route('login');
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }
}
