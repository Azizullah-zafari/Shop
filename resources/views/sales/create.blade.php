@extends('layouts.app')

@section('content')
<div class="container">
    <h2>➕ ثبت فروش</h2>

    <form method="POST" action="{{ route('sales.store') }}">
        @csrf
        <div class="mb-3">
            <label>مشتری</label>
            <select name="customer_id" class="form-control" required>
                <option value="">-- انتخاب مشتری --</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->type }})</option>
                @endforeach
            </select>
        </div>
     {{-- <div class="mb-3">
    <label>مشتری</label>
    <select name="customer_id" class="form-control" required>
        <option value="0">مشتری (مشتری جدید یا ناشناس)</option> این گزینه پیش‌فرض --}}
        {{-- @foreach($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->type }})</option>
        @endforeach
    </select>
    </div> --}}


{{-- <select name="product_id" class="form-control" required>
    <option value="">-- انتخاب محصول --</option>
    @foreach($products as $product)
        <option value="{{ $product->id }}">{{ $product->name }}</option>
    @endforeach
</select> --}}


        <div class="mb-3">
            <label>نام محصول</label>
            <input type="text" name="product" class="form-control" required>
        </div> 
        {{-- <div class="mb-3">
    <label>نام محصول</label>
    <select name="product_id" class="form-control" required>
        <option value="">-- انتخاب محصول --</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    </select>
</div> --}}

        <div class="mb-3">
            <label>تعداد</label>
            <input type="number" name="quantity" class="form-control" required min="1">
        </div>
        <div class="mb-3">
            <label>قیمت واحد (افغانی)</label>
            <input type="text" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>نوع پرداخت</label>
            <select name="payment_type" class="form-control">
                <option value="نقدی">نقدی</option>
                <option value="قرض">قرض</option>
            </select>
        </div>
        <div class="mb-3">
            <label>پرداخت شده</label>
            <input type="text" name="paid" class="form-control" value="0">
        </div>
        <div class="mb-3">
            <label>یادداشت</label>
            <textarea name="note" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">ثبت</button>
    </form>
</div>






@endsection
