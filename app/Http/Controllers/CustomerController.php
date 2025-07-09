<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(8);  // ✅ صفحه‌بندی
        return view('customers.index', compact('customers'));

        // $customers = Customer::latest()->paginate(2);
        // return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',

            'type' => 'required|in:نقدی,دایمی,قرض‌دار',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'مشتری اضافه شد');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'type' => 'required|in:نقدی,دایمی,قرض‌دار',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'مشتری بروزرسانی شد');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'مشتری حذف شد');
    }
}
