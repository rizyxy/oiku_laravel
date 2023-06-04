<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\User;
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

//Guest
Route::middleware(['guest'])->group(function() {

    Route::get('/', function() {
        return view('guest.home', [
            'title' => 'Home',
            'products' => Product::take(4)->get()
        ]);
    });
    Route::get('/catalog', [ProductController::class, 'index']);
    Route::get('/login', [UserController::class, 'index']);
    Route::get('/register', [UserController::class, 'create']);


    Route::post('/login', [UserController::class, 'login']);
    Route::post('/store-user', [UserController::class, 'store']);
});


//Customer
Route::prefix('customer')->middleware(['customer'])->group(function() {

    
    Route::get('/home', function() {
        return view('customer.home', [
            'title' => 'Home',
            'products' => Product::take(4)->get()
        ]);
    });
    Route::get('/catalogCust', function() {
        return view('customer.catalog', [
            'title' => 'Catalog',
            'products' => Product::all()
        ]);
    });
    Route::get('/profile', [UserController::class, 'show']);
    Route::get('/edit-profile', [UserController::class, 'edit']);
    Route::get('/order', [CartController::class, 'index']);
    Route::get('/history', [OrderController::class, 'index']);

    Route::put('/update-profile', [UserController::class, 'update']);

    //Cart
    Route::post('/cart', [CartController::class, 'add']);
    Route::post('/cart/buy', [OrderController::class, 'store']);
    Route::put('/cart', [CartController::class, 'update']);
    Route::put('/cart/minus', [CartController::class, 'minus']);
    Route::put('/cart/plus', [CartController::class, 'plus']);
    Route::delete('/cart', [CartController::class, 'delete']);

});


//Consignor
Route::prefix('consignor')->middleware(['consignor'])->group(function() {

    Route::get('/home', function() {
        return view('consignor.home', [
            'title' => 'Home',
            'products' => Product::all()->where('id_consignor' , '=', auth()->user()->id),
            'orders' => Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
                                ->join('products', 'order_details.product_id', '=', 'products.id')
                                ->select('orders.id', 'orders.id_customer', 'orders.created_at as order_time', 'products.product_name', 'order_details.quantity', 'order_details.subtotal', 'orders.total')
                                ->where('products.id_consignor', '=', auth()->user()->id)
                                ->orderBy('orders.id', 'asc')
                                ->get()
        ]);
    });
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/transaction', [OrderController::class, 'index']);
    Route::get('/add-product', [ProductController::class, 'create']);
    Route::get('/profile', [UserController::class, 'show']);
    Route::get('/edit-profile', [UserController::class, 'edit']);
    Route::get('/edit-product/{product:id}', [ProductController::class, 'edit']);

    Route::post('/add-product/store-product', [ProductController::class, 'store']);

    Route::put('/add-product/update-product', [ProductController::class, 'update']);

    Route::delete('/delete/{product:id}', [ProductController::class, 'destroy']);

});


//Admin
Route::prefix('admin')->middleware(['admin'])->group(function() {
    
    Route::get('/home', function() {
        return view('admin.home', [
            'title' => 'Home',
            'products' => Product::all()
        ]);
    });
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/transaction', [OrderController::class, 'index']);
    Route::get('/take-order', function() {
        return view('admin.take_order', [
            'title' => 'Take Order',
            'admin' => User::all()->where('role', '=', 'admin')
        ]);
    });
    Route::get('/consignor', function() {
        return view('admin.consignor', [
            'title' => 'Consignor List',
            'consignors' => User::all()->where('role', '=', 'consignor')
        ]);
    });
    Route::get('/customer', function() {
        return view('admin.customer', [
            'title' => 'All Customer',
            'customers' => User::all()->where('role', '=', 'customer')
        ]);
    });
    Route::get('/add-consignor', function() {
        return view('admin.add_consignor', [
            'title' => 'Add Consignor'
        ]);
    });
    Route::post('/add-consignor/store-consignor', [UserController::class, 'add_cons']);
});











Route::get('/logout', [UserController::class, 'logout']);

