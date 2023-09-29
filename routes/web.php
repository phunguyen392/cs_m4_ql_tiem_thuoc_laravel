<?php
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\AuthController;
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
    return view('user.master');
});
//thung rac

Route::put('/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('categories.softdeletes');

// Route::get('/viewtrash', [CategoryController::class, 'viewtrash'])->name('viewtrash');
Route::get('categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');

Route::put('categories/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('categories.restoredelete');
    Route::get('categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('category_destroy');
//category

Route::resource('categories',CategoryController::class);
//product
Route::resource('products',ProductController::class);

//login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/welcome', [AuthController::class, 'welcome']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/regenerate', [AuthController::class, 'regenerateSession']);









