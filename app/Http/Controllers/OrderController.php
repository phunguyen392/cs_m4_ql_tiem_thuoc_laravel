<?php

namespace App\Http\Controllers;
use  App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
   public function index(){
    $orders = Order::select('customer_id', DB::raw('MAX(created_at) as last_order'))
    ->groupBy('customer_id')
    ->get();
    return view('admin.orders.index',compact('orders'));
   }
   public function detail($id)
   {
       $oderDetail = DB::table('orders')
       ->join('customers', 'orders.customer_id', '=', 'customers.id')
       ->join('orderdetail', 'orders.id', '=', 'orderdetail.order_id')
       ->join('products', 'orderdetail.product_id', '=', 'products.id')
       ->select('orders.*', 'customers.name as customer_name', 'products.name as product_name', 'products.price as product_price', 'orderdetail.*')
       ->where('orders.customer_id', '=', $id)
       ->orderBy('orders.date_at', 'DESC')
       ->get();

    //    dd($oderDetail);
       return view('admin.orders.detail',compact('oderDetail'));
   }
}
