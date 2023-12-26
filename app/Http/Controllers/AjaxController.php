<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ajax;
use Illuminate\Support\Facades\Http;

class AjaxController extends Controller
{
    public function index()
    {
        return view('ajax-example');
    }

    public function store(Request $request)
    {
        // Lấy dữ liệu từ yêu cầu AJAX
        $data = $request->all();

        // Gửi yêu cầu POST đến API bên ngoài
        $response = Http::post('https://api.example.com/endpoint', $data);

        // Xử lý dữ liệu trả về từ API
        $responseData = $response->json();

        // Trả về phản hồi JSON
        return response()->json($responseData);
    }
}