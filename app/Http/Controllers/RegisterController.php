<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct()
    {
        try {
            $this->middleware('guest');
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function register()
    {
        try {
            $setting = Setting::first();

            return view('version2.authentication.register',compact('setting'));
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function registration(Request $request)
    {
        try {
            $request->validate([
                'name'      => 'required|string|max:255',
                'email'     => 'required|string|email|max:255|unique:users',
                'password'  => 'required|string|min:6|confirmed',
            ]);
    
            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'role_id'   => 3
            ]);
    
            // Auth::login($user);
    
            return redirect()->route('dashboard');
        } catch (\Exception $error) {
            echo $error;
            // return response()->json(['error' => $error->getMessage()], 500);
        }
    }
}
