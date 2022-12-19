<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\SigninUserRequest;
use App\Http\Requests\User\SignupUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function login()
    {
        return view('client.login');
    }
    public function signin(SigninUserRequest $request)
    {
        $request->validated();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index')->with('success', 'Sign in successfully');
        }else{
            return redirect()->back()->with('error','Email or password is incorrect');
        }
    }
    public function register()
    {
        return view('client.register');
    }
    public function signup(SignupUserRequest $request)
    {
        $request->validated();
        $password = Hash::make($request->password);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password
        ];
        User::create($data);
        return redirect()->route('login')->with('success', 'Sign up successfully');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index')->with('success', 'Sign out successfully');
    }
    public function adminLogin()
    {
        return view('admin.login');
    }
    public function adminSignin(SigninUserRequest $request)
    {
        $request->validated();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1])) {
            return redirect()->route('admin.index')->with('success', 'Sign in successfully');
        }else{
            return redirect()->back()->with('error','Email or password is incorrect');
        }
    }
}
