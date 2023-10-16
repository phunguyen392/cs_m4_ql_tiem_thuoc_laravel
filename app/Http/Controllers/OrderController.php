<?php

namespace App\Http\Controllers;
use  App\Models\Order;
use  App\Models\OrderDetail;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
   public function index(){
      $orders = Order::orderby('id','desc')->paginate(4);
    return view('admin.orders.index',compact('orders'));
   }
   public function detail($id)
   {     
       $oderDetails = DB::table('orders')
       ->join('customers', 'orders.customer_id', '=', 'customers.id')
       ->join('orderdetails', 'orders.id', '=', 'orderdetails.order_id')
       ->join('products', 'orderdetails.product_id', '=', 'products.id')
       ->select('orders.*', 'customers.name as customer_name', 'products.product_name as product_name', 'products.price as product_price', 'orderdetails.*')
       ->where('orders.id', '=', $id)
       ->orderBy('orders.date_at', 'DESC')
       ->get();

    //    dd($oderDetail);
       return view('admin.orders.detail',compact('oderDetails'));
   }
//    public function exportOrder(){
//       return Excel::download(new OrderExport, 'order.xlsx');
//   }
}
