<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Sale;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('sale.customer')->latest()->paginate(8);
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $sales = Sale::where('payment_type', 'قرض')->get();
        return view('payments.create', compact('sales'));
    }
    public function edit(Payment $payment)
    {
        $sales = \App\Models\Sale::where('payment_type', 'قرض')->get();
        return view('payments.edit', compact('payment', 'sales'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'amount' => 'required|integer|min:1',
            'paid_at' => 'required|date',
        ]);

        // محاسبه تفاوت و بروزرسانی پرداخت در جدول sale
        $old_amount = $payment->amount;
        $difference = $request->amount - $old_amount;

        $sale = $payment->sale;
        $sale->paid += $difference;
        $sale->save();

        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'پرداخت ویرایش شد');
    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'sale_id' => 'required|exists:sales,id',
    //         'amount' => 'required|integer|min:1',
    //         'paid_at' => 'required|date',
    //     ]);

    //     $sale = Sale::find($request->sale_id);

    //     // افزایش پرداخت به جدول sale
    //     $sale->paid += $request->amount;
    //     $sale->save();

    //     // ثبت پرداخت
    //     Payment::create($request->all());

    //     return redirect()->route('payments.index')->with('success', 'پرداخت ثبت شد');
    // }
    public function store(Request $request)
    {
        $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'amount' => 'required|integer|min:1',
            'paid_at' => 'required|date',
        ]);

        $sale = Sale::find($request->sale_id);
        $sale->paid += $request->amount;
        $sale->save();

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'پرداخت ثبت شد');
    }

    public function destroy(Payment $payment)
    {
        $sale = $payment->sale;
        $sale->paid -= $payment->amount;
        $sale->save();

        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'پرداخت حذف شد');
    }
}
