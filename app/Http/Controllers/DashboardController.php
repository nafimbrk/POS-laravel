<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categoriesTotal = Category::all()->count();
        $productTotal = Product::all()->count();

        return view('dashboard', compact('categoriesTotal', 'productTotal'));
    }
}
