<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
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
        return view('dashboard');
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
        return view('product-order');
    }

    // all order
    public function allOrder() {
        return view('all-order');
    }

    // pending order
    public function pendingOrder() {
        return view('pending-order');
    }

    // success order
    public function successOrder() {
        return view('success-order');
    }
}
