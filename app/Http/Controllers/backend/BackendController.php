<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
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
        return view('customer-list');
    }

    // add customer
    public function addCustomer() {
        return view('custome-add');
    }

    // add customer
    public function cate() {
        return view('categories');
    }

    // add customer
    public function subCate() {
        return view('sub-categories');
    }
}
