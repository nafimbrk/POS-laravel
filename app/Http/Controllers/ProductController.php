<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->search;

        if ($query) {
            $products = Product::with('category')
                            ->where('name', 'like', "%$query%")
                            ->orwhere('stock', 'like', "%$query%")
                            ->orwhere('price', 'like', "%$query%")
                            ->orwhereHas('category', function($q) use ($query) {
                                $q->where('name', 'like', "%$query%");
                             })->get();
        } else {
            $products = Product::with('category')->get();
        }

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();

        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        $newName = '';

        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('public/image', $newName);
        }

        $product = new Product();

        $product->image = $newName;;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->stock = $request->stock;
        $product->price = $request->price;

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with('category')->findOrFail($id);

        $category = Category::select('id', 'name')->get();

        return view('product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $newName = '';

        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('public/image', $newName);

            Storage::delete('public/image/' . $product->image);

            $product->image = $newName;
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->stock = $request->stock;
            $product->price = $request->price;

            $product->save();
        } else {
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->stock = $request->stock;
            $product->price = $request->price;

            $product->save();
        }



        return redirect()->route('product.index')->with('success', 'Product berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        Storage::delete('public/image/'. $product->image);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product berhasil dihapus');
    }
}
