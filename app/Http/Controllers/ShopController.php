<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function register()
    {

        return view('user.register');
    }


    public function checkRegister(Request $request)
    {
        // $validated = $request->validate([
        //     'email' => 'required|unique:customers|email',
        //     'password' => 'required|min:6',
        // ]);
        $notifications = [
            'ok' => 'ok',
        ];
        $notification = [
            'message' => 'error',
        ];
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address =  $request->address;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->psw);
        if ($request->psw == $request->psw_repeat) {
            $customer->save();
            // dd(1);
            // return redirect()->route('user.index');
        } else {
            // dd(2);
            // return redirect()->route('user.index')->with($notification);
        }
    }

    public function login()
    {
        return view('user.login');
    }

    public function checklogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('customers')->attempt($arr)) {
            // dd(1);
            return redirect()->route('categories.index');
        } else {
            // return redirect()->route('user.login');
            return redirect('user/login')->with('error', 'Đăng nhập thất bại, tk or mk k đúng');
        }
    }
    public function home()
    {
        $categories = Category::get();
        $products = Product::get();

        return view('user.home',compact('categories','products'));

    }
}
