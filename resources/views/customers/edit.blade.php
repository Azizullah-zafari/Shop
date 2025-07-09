@extends('layouts.app')

@section('content')
<div class="container">
    <h2>✏️ ویرایش مشتری</h2>

    <form method="POST" action="{{ route('customers.update', $customer->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>نام مشتری</label>
            <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
        </div>
        <div class="mb-3">
            <label>شماره تماس</label>
            <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}">
        </div>
        <div class="mb-3">
            <label>آدرس</label>
            <input type="text" name="address" class="form-control" value="{{ $customer->address }}">
        </div>
        <div class="mb-3">
            <label>نوع مشتری</label>
            <select name="type" class="form-control">
                <option value="نقدی" {{ $customer->type == 'نقدی' ? 'selected' : '' }}>نقدی</option>
                <option value="دایمی" {{ $customer->type == 'دایمی' ? 'selected' : '' }}>دایمی</option>
                <option value="قرض‌دار" {{ $customer->type == 'قرض‌دار' ? 'selected' : '' }}>قرض‌دار</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
    </form>
</div>
@endsection
