<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

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
            return redirect()->route('cart');
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
    
        $products = $products->where('status',1)->orderby('id','desc')->paginate(4);
     
        return view('user.home',compact('categories','products'));
        

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
            session()->flash('success', 'Sản phẩm đã được thêm vào giỏ hàng thành công.');
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

    public function checkout(){
        $categories = Category::all();
        return view('user.checkout',compact('categories'));
    }

    public function order(Request $request)
    {
        // dd($request->product_id);
        if ($request->product_id == null) {
            return redirect()->back();
        } else {
            $id = Auth::guard('customers')->user()->id;
            $customer = Customer::findOrfail($id);
            $customer->name = $request->name;
            $customer->address = $request->address;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->password = bcrypt($request->password);

            if (isset($request->note)) {
                $customer->note = $request->note;
            }
            $customer->save();

            $order = new Order();
            $order->customer_id = Auth::guard('customers')->user()->id;
            $order->date_at = date('Y-m-d H:i:s');
            $order->date_ship = date('Y-m-d H:i:s');
            $order->note = 'dsadasdas';
            $order->total = '12';

            


            $order->save();
        }
        $count_product = count($request->product_id);
        for ($i = 0; $i < $count_product; $i++) {
            $orderItem = new OrderDetail();
            $orderItem->order_id =  $order->id;
            $orderItem->product_id = $request->product_id[$i];
            $orderItem->quantity = $request->quantity[$i];
            $orderItem->total = $request->total[$i];
            $orderItem->save();
            session()->forget('cart');
            DB::table('products')
                ->where('id', '=', $orderItem->product_id)
                ->decrement('quantity', $orderItem->quantity);
        }
        $notification = [
            'message' => 'success',
        ];
        // $data = [
        //     'name' => $request->name,
        //     'pass' => $request->password,
        // ];
        // Mail::send('mail.mail', compact('data'), function ($email) use ($request) {
        //     $email->subject('Shein Shop');
        //     $email->to($request->email, $request->name);
        // });

        // dd($request);
        // alert()->success('Thêm Đơn Đặt: '.$request->name,'Thành Công');
        return redirect()->route('user.home')->with($notification);;
        // }
        // } catch (\Exception $e) {
        //     // dd($request);
        //     Log::error($e->getMessage());
        //     // toast('Đặt hàng thấy bại!', 'error', 'top-right');
        //     return redirect()->route('shop.index');
        // }
    }
}
