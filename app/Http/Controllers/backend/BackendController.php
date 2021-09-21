<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    // login
    public function index() {
        return view('login');
    }

    // dashboard
    public function dash() {
        $customer = Customer::get();
        $order = Order::get();
        $pending = Order::where('status',null)->get();
        $success = Order::where('status','!=',null)->get();
        $product = Product::get();
        return view('dashboard',compact('customer','order','product','pending','success'));
    }

    // customer
    public function customer() {
        $show = Customer::latest()->get();
        return view('customer-list',compact('show'));
    }

    // add category
    public function cate() {
        $show = Category::latest()->get();
        return view('categories',compact('show'));
    }

    // product list
    public function product() {
        $show = Category::latest()->get();
        $product = Product::latest()->with('cate')->get();
        return view('product-list',compact('show','product'));
    }

    // product order
    public function proOrder() {
        $show = Product::latest()->with('cate')->get();
        $customer = Customer::latest()->get();
        $cart = Cart::latest()->with('product')->get();
        $qty = Cart::all()->sum(function ($t){
            return $t->qty;
        });
        $sub = Cart::all()->sum(function ($t){
            return $t->price * $t->qty;
        });
        $vat = $sub * 2 / 100;
        $total = $sub + $vat;
        return view('product-order',compact('show','customer','cart','qty','sub','vat','total'));
    }

    // all order
    public function allOrder() {
        $show = Order::latest()->with('cus')->get();
        return view('all-order',compact('show'));
    }

    // pending order
    public function pendingOrder() {
        $show = Order::where('status',null)->latest()->with('cus')->get();
        return view('pending-order',compact('show'));
    }

    // success order
    public function successOrder() {
        $show = Order::where('status','!=',null)->latest()->with('cus')->get();
        return view('success-order',compact('show'));
    }
}
