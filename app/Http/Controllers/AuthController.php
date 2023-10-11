<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;






class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Session::has('email')) {
            // khi o trang product khong quay lai login duoc 
            return redirect('categories');
        }
        return view('admin.login');
    }
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->back();
        } else {
            return view('admin.login');
        }
    }
    public function postLogin(Request $request)
    {
        $messages = [
            "email.exists" => "Email không đúng",
            "password.exists" => "Mật khẩu không đúng",
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'exists:users,email',
            'password' => 'exists:users,password',
        ], $messages);
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('categories.index');
            // dd(1);
        } else {
            return back()->withErrors($validator)->withInput();
        }
    }
    public function welcome()
    {
        if (session::exists('user')) {
            return view('welcome');
        } else {
            return view('login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function regenerateSession()
    {
        // Tạo lại ID của phiên
        Session::regenerate();      
        return redirect('/welcome');
    }
 
}
