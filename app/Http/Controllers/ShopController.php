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
    public function home(Request $request)
    {
        $categories = Category::get();
        // $products = Product::paginate(4);



        $products = Product::with('category');
    
        if ($request->has('keyword')) {
            $keyword = $request->keyword;
            $products->where('product_name', 'like', '%' . $keyword . '%')
             ->orwhere('status', 'like', '%' . $keyword . '%');
        }
    
        $products = $products->orderby('id','desc')->paginate(4);
     
        return view('user.home',compact('categories','products'));
        
    }

    public function detail($id){
        
        $category = Category::find($id);
        $product = Product::find($id);
        $products = Product::get();
        $relatedProducts = $category->products;
        return view('user.detail',compact('category','product','products','relatedProducts'));
    }

    }
