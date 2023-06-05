<?php

namespace App\Http\Controllers;

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
                'title' => "Home"
            ]);
        } else if (Auth::user()->role == 'consignor') {
            return view('consignor.home', [
                'title' => "Home"
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
            'profile_pic' => $data['profile_pic'],
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
            'profile_pic' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);

        $data = $request->all();

        User::where('id', '=', $user->id)->update([
            'profile_pic' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);

        return redirect()->back();

    }

    public function logout() {
     
        Session::flush();
        Auth::logout();

        return redirect('/');

    }

    
}
