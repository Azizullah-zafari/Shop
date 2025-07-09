@extends('layouts.app')

@section('content')
<div class="container">
    <h2>➕ ثبت پرداخت</h2>

    <form method="POST" action="{{ route('payments.store') }}">
        @csrf

        <div class="mb-3">
            <label>انتخاب فروش (برای مشتری قرض‌دار)</label>
            <select name="sale_id" class="form-control" required>
                <option value="">-- انتخاب فروش --</option>
                @foreach($sales as $sale)
                    <option value="{{ $sale->id }}">
                        {{ $sale->customer->name }} - {{ $sale->product }} (باقی: {{ $sale->remaining }} AF)
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>مقدار پرداخت (AF)</label>
            <input type="number" name="amount" step="50" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>تاریخ پرداخت</label>
            <input type="date" name="paid_at" class="form-control" value="{{ date('Y-m-d') }}">
        </div>

        <div class="mb-3">
            <label>یادداشت</label>
            <textarea name="note" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">ثبت</button>
    </form>
</div>
@endsection
