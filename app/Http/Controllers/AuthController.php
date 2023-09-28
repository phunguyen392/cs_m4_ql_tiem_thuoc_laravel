<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User;

use Illuminate\Http\Request;

class AuthController extends Controller
{
public function showLoginForm(){
    if (Session::has('email')) {
        // khi o trang product khong quay lai login duoc 
        return redirect('categories');

    }
    return view('admin.login');
}
public function login(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');

    $user = User::where('email', $email)->first();

    if ($user && password_verify($password, $user->password)) {
        // Đăng nhập thành công, lưu thông tin người dùng vào Session
        Session::put('user_id', $user->id);
        Session::put('user_name', $user->name);

        return redirect('/categories'); // Chuyển hướng tới trang dashboard sau khi đăng nhập thành công
    } else {
        // Đăng nhập thất bại, xử lý lỗi đăng nhập
        return redirect('/login')->with('error', 'Đăng nhập thất bại');
    }
}
public function welcome()
{
    if(session::exists('user')){
        return view('welcome');
    }
    else{
        return view('login');
    }
}
public function logout()
{
    // Xóa thông tin đăng nhập khỏi Session
    Session::forget('user');
    return redirect('/login');
}
public function regenerateSession()
{
    // Tạo lại ID của phiên
    Session::regenerate();
    return redirect('/welcome');
}

}