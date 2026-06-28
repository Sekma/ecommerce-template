<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [

            'products'   => Product::count(),
            'categories' => Category::count(),
            'customers'  => Customer::count(),
            'orders'     => Order::count(),

        ]);
    }
}
