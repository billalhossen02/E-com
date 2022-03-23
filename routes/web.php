<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Slider;
use App\Models\Category;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// for Frontend
if(Schema::hasTable('users')){
    $users = User::all();
}


Route::get('/',[HomeController::class, 'home'])->name('/');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('show/details/{id}',[HomeController::class, 'showproduct']);
Route::get('products/show/{id}',[HomeController::class,'productsshow']);
Route::get('nav',[HomeController::class, 'nav']);
Route::get('search',[HomeController::class, 'search'])->name('search');

Route::get('login/blade',[HomeController::class, 'login']);
Route::get('register/blade',[HomeController::class, 'register']);
Route::post('member/store',[HomeController::class, 'memberStore'])->name('member/store');
Route::post('custom/login',[HomeController::class, 'customLogin'])->name('custom/login');
Route::get('logout',[HomeController::class, 'customLogout']);


// for backend
Route::get('allproduct',[ProductController::class, 'allproduct'])->name('allProduct');
Route::post('addproduct',[ProductController::class, 'addproduct'])->name('addProduct');

Route::get('edit/product/{id}',[ProductController::class, 'editproduct']);
Route::post('update/product/{id}',[ProductController::class, 'updateproduct']);
Route::get('delete/product/{id}',[ProductController::class, 'deleteproduct']);
Route::get('show/product/{id}',[ProductController::class, 'showproduct']);

//Category Backend

Route::get('allcategory',[CategoryController::class, 'allcategory'])->name('allCategory');
Route::post('allcategory',[CategoryController::class, 'addcategory'])->name('addCategory');
Route::get('category/delete/{id}',[CategoryController::class, 'categorydelete']);

Route::get('allslider',[SliderController::class, 'allslider'])->name('allSlider');
Route::post('addslider',[SliderController::class, 'addslider'])->name('addSlider');
Route::get('slider/delete/{id}',[SliderController::class, 'deleteSlider'] );


// for cart

Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->name('payment');
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax'])->name('paymentcheck');

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

Route::get('getCategory',[HomeController::class, 'getCategory']);
