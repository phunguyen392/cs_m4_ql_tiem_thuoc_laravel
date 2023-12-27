<?php

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AjaxController;
use App\Models\Ajax;


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
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
//user
Route::get('shop/register', [ShopController::class, 'register'])->name('shop.register');
Route::post('shop/checkRegister', [ShopController::class, 'checkRegister'])->name('shop.checkRegister');
Route::get('shop/login', [ShopController::class, 'login'])->name('shop.login');
Route::post('shop/checklogin', [ShopController::class, 'checklogin'])->name('shop.checklogin');
Route::get('logout', [ShopController::class, 'logout'])->name('shop.logout');
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
// Route::get('/regenerate', [AuthController::class, 'regenerateSession']);


//details route
Route::get('/home', [ShopController::class, 'home'])->name('shop.home');
Route::get('shop/detail/{id}', [ShopController::class, 'detail'])->name('shop.detail');

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
Route::post('/orders', [ShopController::class, 'order'])->name('order');
Route::get('orders/index', [OrderController::class, 'index'])->name('orders.index');
Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('orders.detail');
Route::get('/export', [OrderController::class, 'exportOrder'])->name('export');

//show more
// Route::get('/show-more', [HomeController::class, 'showMore'])->name('showMore');

//customer
Route::get('/customers',[CustomerController::class,'index'])->name('customers.index');

Route::get('/ajax-example', 'AjaxController@index')->name('ajax.example');
Route::post('/ajax-example', 'AjaxController@store')->name('ajax.store');