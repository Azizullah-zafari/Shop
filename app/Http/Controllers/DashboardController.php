<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
// use Illuminate\Http\Request;

// class DashboardController extends Controller
// {
//     public function index()
//     {
//         return view('dashboard');
//     }
// }
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Sale;
// use App\Models\Customer;
// use App\Models\Payment;

// class DashboardController extends Controller
// {
// public function index()
// {
//     // جمع کل فروش
//     $totalSales = Sale::sum('amount');

//     // جمع کل قرض داده شده (مجموع amount منهای paid)
//     $totalDebt = Payment::sum('amount') - Payment::sum('paid');

//     // تعداد مشتریان
//     $totalCustomers = \App\Models\Customer::count();

//     return view('dashboard', compact('totalSales', 'totalDebt', 'totalCustomers'));
// }


class DashboardController extends Controller
{

    public function index()
    {
        $totalSales = Sale::all()->sum(fn($sale) => $sale->total_amount);
        $totalPaid = Sale::sum('paid');
        $totalDebt = Sale::all()->sum(fn($sale) => $sale->remaining);
        $totalCustomers = Customer::count();

        // گرفتن لیست مشتریان قرض‌دار با pagination
        $customersWithDebt = Customer::whereHas('sales', function ($query) {
            $query->whereRaw('(quantity * price) - paid > 0');
        })->paginate(5); // در هر صفحه ۵ مشتری

        return view('dashboard', compact(
            'totalSales',
            'totalPaid',
            'totalDebt',
            'totalCustomers',
            'customersWithDebt'
        ));
    }
}
