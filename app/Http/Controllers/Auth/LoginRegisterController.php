<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class LoginRegisterController extends Controller
{
    public function __construct(){
        $this->middleware("guest")->except{[
            'logout','dashboard'
        ]};
    }
    public function register(Request $request){
        return view('auth.register');
    }
    public function store(request $request){
        $request->validate([
            'name'=> 'required|string|max:250',
            'email'=> 'required|email|max:250|unique:users',
            'password'=> 'required|min:8|confirmed'
        ]);
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'->Hash::make($request->password)
        ]);
        $credential=$request->only('email','password');
        Auth::attempt($credential);
        $request->session()->regenerate();
        return redirect()->route('dashboard')->withSuccess('Succesfully Registered & Logged');
    }
    public function login(){
        return view('auth.login');
    }
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication was successful
            $request->session()->regenerate();
            return redirect('/home')->with('success', 'Login Success');
        }

        // Authentication failed
        return back()->withErrors('error', 'Incorrect Email or Password');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->withSuccess('You Have Been Logged Out');
    }
}
