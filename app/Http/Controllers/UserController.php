<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function home() {
        if (Auth::user()->role == 'admin') {
            return view('admin.home', [
                'title' => "Home",
                'customers' => User::all()->where('role', '=', 'customer')->count(),
                'consignors' => User::all()->where('role', '=', 'consignor')->count(),
                'orders' => Order::all(),
                'products' => Product::all()
            ]);
        } else if (Auth::user()->role == 'consignor') {
            return view('consignor.home', [
                'title' => "Home",
                'orders' => Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
                                ->join('products', 'order_details.product_id', '=', 'products.id')
                                ->select('orders.id', 'orders.id_customer', 'orders.created_at as order_time', 'orders.status','products.product_name', 'order_details.quantity', 'order_details.subtotal', 'orders.total')
                                ->where('status', '=', 'Accepted')
                                ->where('products.id_consignor', '=', auth()->user()->id)
                                ->get(),
                'products' => Product::where('id_consignor', '=', auth()->user()->id)->get(),
            ]);
        } else if (Auth::user()->role == 'customer') {
            return view('customer.home', [
                'title' => "Home"
            ]);
        } else if (Auth::user() == null) {
            return view('guest.home', [
                'title' => "Home"
            ]);
        }
    }

    public function index()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function create() {
        return view('auth.register', [
            'title' => "Register"
        ]);
    }
    

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:8'
        ]);

        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'role' => 'customer',
            'password' => Hash::make($data['password'])
        ]);

        return redirect('/login');
    }

    public function add_cons(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:8'
        ]);

        $data = $request->all();

        User::create([
            'profile_pic' => $data['profile_pic'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'role' => 'consignor',
            'password' => Hash::make($data['password'])
        ]);

        return redirect()->back();
    }

    public function login(Request $request) {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            if (auth()->user()->role == 'admin') {
                return redirect('/admin/home');
            } else if (auth()->user()->role == 'consignor') {
                return redirect('/consignor/home');
            } else if (auth()->user()->role == 'customer') {
                return redirect('/customer/home');
            }

        }

        return redirect('/login');
    }

    public function show() {
        if (auth()->user()->role == 'customer') {
            return view('customer.profile', [
                'title' => 'Profile',
                'user' => Auth::user()
            ]);
        } else if (auth()->user()->role == 'consignor') {
            return view('consignor.profile', [
                'title' => 'Profile',
                'user' => Auth::user()
            ]);
        }
    }

    public function edit() {
        if (auth()->user()->role == 'customer') {
            return view('customer.edit_profile', [
                'title' => 'Edit Profile',
                'user' => Auth::user()
            ]);
        } else if (auth()->user()->role == 'consignor') {
            return view('consignor.edit_profile', [
                'title' => 'Edit Profile',
                'user' => Auth::user()
            ]);
        }
    }

    public function update(Request $request, User $user) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $data = $request->all();

        User::where('id', '=', $user->id)->update([
            'profile_pic' => $data['profile_pic'] ?? $user->profile_pic,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);

        return redirect()->back();

    }

    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect()->back();
    }

    public function logout() {
     
        Session::flush();
        Auth::logout();

        return redirect('/');

    }

    
}
