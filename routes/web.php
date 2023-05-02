<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function() {
    return view('guest.home', [
        'title' => "Home",
        'products' => Product::all()
    ]);
})->middleware('guest');

Route::get('/catalog', function() {
    return view('guest.catalog', [
        'title' => "Catalog",
        'products' => Product::all()
    ]);
});

Route::get('/login', [UserController::class, 'index'])->middleware('guest');

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::get('/customer/home', function() {
    return view('customer.home', [
        'title' => "Home",
        'products' => Product::all()
    ]);
});

Route::get('/customer/catalog', function() {
    return view('customer.catalog', [
        'title' => "Catalog",
        'products' => Product::all()
    ]);
});

Route::get('/customer/profile', function() {
    return view('customer.profile', [
        'title' => "Profile"
    ]);
});

Route::get('/customer/order', [OrderController::class, 'index']);

Route::get('/customer/history', [OrderController::class, 'show']);

Route::get('/consignor/product', [ProductController::class, 'index']);

Route::get('/consignor/transaction', function() {
    return view('consignor.transaction', [
        'title' => 'Transaction'
    ]);
});

Route::get('/consignor/add-product', [ProductController::class, 'create']);

Route::post('/consignor/add-product/store-product', [ProductController::class, 'store']);

Route::delete('/consignor/delete/{product:id}', [ProductController::class, 'destroy']);

Route::get('/consignor/profile', function() {
    return view('consignor.profile', [
        'title' => 'Profile'
    ]);
});

Route::get('/consignor/edit-profil', function() {
    return view('consignor.edit_profile', [
        'title' => 'Edit Profile'
    ]);
});

Route::get('/admin/home', function() {
    return view('admin.home', [
        'title' => 'Home'
    ]);
});

Route::get('/admin/consignor', function() {
    return view('admin.consignor', [
        'title' => 'Consignor List'
    ]);
});

Route::get('/admin/customer', function() {
    return view('admin.customer', [
        'title' => 'Customer List'
    ]);
});

Route::get('/admin/transaction', function() {
    return view('admin.transaction', [
        'title' => 'Transaction'
    ]);
});

Route::get('/admin/add-consignor', function() {
    return view('admin.add_consignor', [
        'title' => 'Add Consignor'
    ]);
});

Route::get('/admin/take-order', function() {
    return view('admin.take_order', [
        'title' => 'Take Order'
    ]);
});

Route::post('/login', [UserController::class, 'login']);

Route::post('/store-user', [UserController::class, 'store'])->middleware('guest');

Route::get('/logout', [UserController::class, 'logout']);

