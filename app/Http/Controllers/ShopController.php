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
        // $categories = Category::get();
        // $products = Product::paginate(4);

        $categories = Category::all();







        $products = Product::with('category');

        if ($request->has('keyword')) {
            $keyword = $request->keyword;
            $products->where('product_name', 'like', '%' . $keyword . '%')
                ->orwhere('status', 'like', '%' . $keyword . '%');
        }

        $products = $products->where('status', 1)->orderby('id', 'desc')->paginate(8);

        return view('user.home', compact('categories', 'products'));
    }

    public function detail($id)
    {
        $category = Category::find($id);
        $product = Product::find($id);
        return view('user.detail', compact('category', 'product'));
    }



    
    public function cart()

    {
        $products = Product::get();

        return view('user.cart');
    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function addToCart($id)

    {

        $product = Product::findOrFail($id);



        $cart = session()->get('cart', []);



        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;
        } else {

            $cart[$id] = [

                "product_name" => $product->product_name,

                "quantity" =>1,

                "price" => $product->price,

                "image" => $product->image

            ];
        }



        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function update(Request $request)

    {

        if ($request->id && $request->quantity) {

            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'them thanh cong');
        }
    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function remove(Request $request)

    {

        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'xoa sp thanh cong');
        }
    }
}
