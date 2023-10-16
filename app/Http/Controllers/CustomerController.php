<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $customers = Customer::get();
    
  
        $inputPassword = $request->input('password');
        $customer = Customer::find(1); // Ví dụ lấy thông tin người dùng từ model Customer
        $hashedPassword = $customer->password; // Lấy mật khẩu đã mã hoá từ nguồn dữ liệu

        // Giải mã và kiểm tra mật khẩu
        if (Hash::check($inputPassword, $hashedPassword)) {
            // Mật khẩu đúng
            $decryptedPassword = $inputPassword; // Lưu trữ mật khẩu đã giải mã để hiển thị
        } else {
            // Mật khẩu không đúng
            // Xử lý theo logic của bạn, ví dụ: hiển thị thông báo lỗi
        }

        // Trả về view hoặc thực hiện hành động khác
        return view('admin.customers.index', ['password' => $decryptedPassword],compact('customers','customer','hashedPassword'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
