@extends('layouts.app')

@section('content')
<div class="container">
    <h2>ثبت هزینه جدید</h2>
    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">عنوان هزینه</label>
            <input type="text" name="title" id="title" class="form-control" required value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">مبلغ (افغانی)</label>
            <input type="text" name="amount" id="amount" class="form-control" required min="0"  value="{{ old('amount') }}">
        </div>
        <div class="mb-3">
            <label for="expense_date" class="form-label">تاریخ هزینه</label>
            <input type="date" name="expense_date" id="expense_date" class="form-control" required value="{{ old('expense_date') }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">توضیحات (اختیاری)</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">ثبت</button>
        <a href="{{ route('expenses.index') }}" class="btn btn-secondary">انصراف</a>
    </form>
</div>
@endsection
