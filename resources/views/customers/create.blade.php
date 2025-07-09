@extends('layouts.app')

@section('content')
<div class="container">
    <h2>➕ افزودن مشتری جدید</h2>

    <form method="POST" action="{{ route('customers.store') }}">
        @csrf
        <div class="mb-3">
            <label>نام مشتری</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>شماره تماس</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="mb-3">
            <label>آدرس</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="mb-3">
            <label>نوع مشتری</label>
            <select name="type" class="form-control">
                <option value="نقدی">نقدی</option>
                <option value="دایمی">دایمی</option>
                <option value="قرض‌دار">قرض‌دار</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">ثبت</button>
    </form>
</div>
@endsection
