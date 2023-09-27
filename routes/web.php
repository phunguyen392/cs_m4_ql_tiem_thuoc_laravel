<?php
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

Route::get('/b', function () {
    return view('admin. master');
});
Route::resource('categories',CategoryController::class);
Route::resource('products',ProductController::class);

