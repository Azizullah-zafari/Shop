@extends('layouts.app')

@section('content')
<div class="container">
    <h2>✏️ ویرایش پرداخت</h2>

    <form method="POST" action="{{ route('payments.update', $payment->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>انتخاب فروش</label>
            <select name="sale_id" class="form-control" required>
                @foreach($sales as $sale)
                    <option value="{{ $sale->id }}" {{ $payment->sale_id == $sale->id ? 'selected' : '' }}>
                        {{ $sale->customer->name }} - {{ $sale->product }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>مقدار پرداخت (AF)</label>
            <input type="number" name="amount" class="form-control" required value="{{ $payment->amount }}">
        </div>

        <div class="mb-3">
            <label>تاریخ پرداخت</label>
            <input type="date" name="paid_at" class="form-control" value="{{ $payment->paid_at }}">
        </div>

        <div class="mb-3">
            <label>یادداشت</label>
            <textarea name="note" class="form-control">{{ $payment->note }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
    </form>
</div>
@endsection
