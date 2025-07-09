@extends('layouts.app')

@section('content')
<div class="container">
    <h2>افزودن محصول جدید</h2>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <div class="mb-3">
            <label>نام محصول</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label>قیمت (افغانی)</label>
            <input type="number" name="price"  step="10" class="form-control" required value="{{ old('price') }}">
        </div>
        <div class="mb-3">
    <label>موجودی اولیه (کل وارد شده)</label>
    <input type="number" name="stock" class="form-control" required value="{{ old('stock') }}">
</div>

<div class="mb-3">
    <label>موجودی فعلی (مقدار باقی‌مانده)</label>
    <input type="number" name="current_stock" class="form-control" required value="{{ old('current_stock') ?? old('stock') }}">
</div>

        <div class="mb-3">
            <label>توضیحات</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <button class="btn btn-success">ثبت محصول</button>
    </form>
</div>
@endsection
