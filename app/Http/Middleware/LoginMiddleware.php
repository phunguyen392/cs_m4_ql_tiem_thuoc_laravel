<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('user')) {
            // Người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập
            return redirect('/login')->with('error', 'Bạn cần đăng nhập để truy cập vào trang sản phẩm.');
        }
        
        
        return $next($request);
        // if (auth()->check()) {
        //     return $next($request);
        // }

        // return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
    }
}
