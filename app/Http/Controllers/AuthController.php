<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginValidateRequest;
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
    public function postLogin(LoginValidateRequest $request)
    {   
        // $credentials = [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];
        // if (Auth::guard('users')->attempt($credentials))
        //     {

        //         return redirect()->route('categories.index')->with('success', 'Đăng nhập thành công');
        //     }
        // else
        //     {
        //         return redirect()->route('login')->with('error', 'Đăng nhập thất bại');
        //     }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            return redirect()->route('categories.index')->with('success',__('Đăng nhập thành công'));
        } else {
            return redirect()->route('login')->with('error', __('Đăng nhập thất bại'));
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
