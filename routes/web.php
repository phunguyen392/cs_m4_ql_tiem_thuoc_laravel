<?php

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;


use App\Models\Customer;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
//thung rac
Route::prefix('/')->middleware(['auth', 'preventBackHistory'])->group(function () {

    // Route::get('/viewtrash', [CategoryController::class, 'viewtrash'])->name('viewtrash');
    Route::put('categories/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('categories.softdeletes');
    //cate
    Route::get('categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
    Route::put('categories/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('categories.restoredelete');
    Route::get('categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('category_destroy');

    Route::resource('categories', CategoryController::class);
    Route::put('products/softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('products.softdeletes');

//pro
Route::get('products/trash', [ProductController::class, 'trash'])->name('products.trash');
Route::put('products/restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('products.restoredelete');
Route::get('products/destroy/{id}', [ProductController::class, 'destroy'])->name('product_destroy');
Route::resource('products', ProductController::class);

//groups
Route::resource('groups',GroupController::class);
Route::get('groups/detail/{id}', [GroupController::class,'detail'])->name('groups.detail');
Route::put('groups/group_details/{id}', [GroupController::class,'group_detail'])->name('groups.group_details');

});
//User
Route::resource('users', UserController::class);
Route::put('updatepass/{id}', [UserController::class, 'updatepass'])->name('users.updatepass');

Route::get('lang/languge', [CategoryController::class, 'change'])->name('changeLang');





//product
// });
//login
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/welcome', [AuthController::class, 'welcome']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/regenerate', [AuthController::class, 'regenerateSession']);

//user
Route::get('user/register', [ShopController::class, 'register'])->name('user.register');
Route::post('user/checkRegister', [ShopController::class, 'checkRegister'])->name('user.checkRegister');
Route::get('user/login', [ShopController::class, 'login'])->name('user.login');
Route::post('user/checklogin', [ShopController::class, 'checklogin'])->name('user.checklogin');
//details route
Route::get('/', [ShopController::class, 'home'])->name('user.home');
Route::get('user/detail/{id}', [ShopController::class, 'detail'])->name('user.detail');

//gio hang
Route::get('cart', [ShopController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ShopController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ShopController::class, 'remove'])->name('remove.from.cart');

//chekOut
Route::get('checkout', [ShopController::class, 'checkout'])->name('checkout');
Route::get('/c', function () {
    return view('user.checkout1');
});
Route::get('/c', function () {
    return view('admin.login1');
});
Route::get('/s', function () {
    return view('admin.includes.sidebar1');
});
//order
Route::post('/order', [ShopController::class, 'order'])->name('order');
Route::get('orders/index', [OrderController::class, 'index'])->name('orders.index');
Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('orders.detail');
Route::get('/export', [OrderController::class, 'exportOrder'])->name('export');

//show more
Route::get('/show-more', [HomeController::class, 'showMore'])->name('showMore');
