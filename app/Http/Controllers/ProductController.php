<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::all();
        $products = Product::paginate(8); // صفحه‌بندی 10 محصول در هر صفحه

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        Product::create($request->only('name', 'price', 'stock', 'current_stock', 'description'));

        return redirect()->route('products.index')->with('success', 'محصول اضافه شد');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        $product->update($request->only('name', 'price', 'stock', 'description'));
        return redirect()->route('products.index')->with('success', 'محصول بروزرسانی شد');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'محصول حذف شد');
    }
}
