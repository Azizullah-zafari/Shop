@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <h2>ویرایش فروش</h2>

    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>نام محصول</label>
            <input type="text" name="product" class="form-control" value="{{ $sale->product }}" required>
        </div>

        <div class="mb-3">
            <label>تعداد</label>
            <input type="number" name="quantity" class="form-control" value="{{ $sale->quantity }}" required>
        </div>

        <div class="mb-3">
            <label>قیمت</label>
            <input type="number" name="price" class="form-control" value="{{ $sale->price }}" required>
        </div>

        <div class="mb-3">
            <label>پرداخت شده</label>
            <input type="number" name="paid" class="form-control" value="{{ $sale->paid }}" required>
        </div>

        <div class="mb-3">
            <label>یادداشت</label>
            <textarea name="note" class="form-control">{{ $sale->note }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">ذخیره تغییرات</button>
    </form>
</div> --}}
<div class="container">
    <h2>✏️ ویرایش بلیت</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('sales.update', $sale->id) }}">
        @csrf
        @method('PUT')

        {{-- <div class="mb-3">
            <label>نام مشتری</label>
            <input type="text" name="product" class="form-control" value="{{ $sale->product }}" required>
        </div> --}}

        <div class="mb-3">
            <label>نام محصول</label>
            <input type="text" name="product" class="form-control" value="{{ old('product', $sale->product) }}" required>
        </div>

        <div class="mb-3">
                    <label>تعداد</label>
            <input type="number" name="quantity" class="form-control" value="{{ $sale->quantity }}" required> 
        </div>

        <div class="mb-3">
            <label>قیمت</label>
            <input type="number" name="price" class="form-control" value="{{ $sale->price }}" required>
        </div>

        <div class="mb-3">
            <label>نوع پرداخت</label>
            <select name="payment_type" class="form-control" required>
                <option value="نقدی" {{ old('payment_type', $sale->payment_type) == 'نقدی' ? 'selected' : '' }}>نقدی</option>
                <option value="قرض" {{ old('payment_type', $sale->payment_type) == 'قرض' ? 'selected' : '' }}>قرض</option>
            </select>
        </div>

        <div class="mb-3">
            <label>پرداخت شده</label>
            <input type="number" name="paid" class="form-control" value="{{ $sale->paid }}" required>
        </div>

       <div class="mb-3">
            <label>یادداشت</label>
            <textarea name="note" class="form-control">{{ $sale->note }}</textarea>
        </div>


        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
    </form>
</div>
@endsection
