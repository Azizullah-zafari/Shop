<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Product;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('customer')->latest()->paginate(8);
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();

        return view('sales.create', compact('customers', 'products'));
    }

    public function edit($id)
    {
        $sale = Sale::findOrFail($id);

        return view('sales.edit', compact('sale'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product' => 'required',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
            'payment_type' => 'required|in:نقدی,قرض',
        ]);

        Sale::create($request->all());

        return redirect()->route('sales.index')->with('success', 'فروش ثبت شد');
    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'product_id' => 'required|exists:products,id',
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     $product = Product::findOrFail($request->product_id);

    //     if ($product->current_stock < $request->quantity) {
    //         return back()->with('error', 'موجودی کافی نیست!');
    //     }

    //     // ثبت فروش
    //     Sale::create([
    //         'product_id' => $product->id,
    //         'quantity' => $request->quantity,
    //     ]);

    //     // کاهش موجودی فعلی
    //     $product->current_stock -= $request->quantity;
    //     $product->save();

    //     return redirect()->back()->with('success', 'فروش با موفقیت ثبت شد و موجودی به‌روزرسانی شد.');
    // }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'paid' => 'required|numeric|min:0',
            'note' => 'nullable|string|max:1000',
        ]);

        $sale = \App\Models\Sale::findOrFail($id);

        $sale->update([
            'product' => $request->product,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'paid' => $request->paid,
            'note' => $request->note,
        ]);

        return redirect()->route('sales.index')->with('success', 'فروش با موفقیت به‌روزرسانی شد.');
    }


    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'فروش حذف شد');
    }
    public function debts()
    {
        $debts = Sale::with('customer', 'product')
            ->where('payment_type', 'قرض')
            ->whereColumn('paid', '<', \DB::raw('quantity * price'))
            ->paginate(8);

        return view('sales.debts', compact('debts'));
    }
}
