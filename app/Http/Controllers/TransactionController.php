<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(Request $request) {

        $query = $request->search;

        if ($query) {
            $products = Product::where('name', 'like', "%$query%")
                            ->orwhere('stock', 'like', "%$query%")
                            ->orwhere('price', 'like', "%$query%")
                            ->get();
        } else {
            $products = Product::all();
        }


        return view('transaction.index', compact('products'));
    }
}
