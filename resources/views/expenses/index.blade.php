@extends('layouts.app')

@section('content')
<div class="container">
    <h2>لیست هزینه‌ها</h2>
    <a href="{{ route('expenses.create') }}" class="btn btn-primary mb-3">ثبت هزینه جدید</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>عنوان</th>
                <th>مبلغ (افغانی)</th>
                <th>تاریخ هزینه</th>
                <th>توضیحات</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
                <tr>
                    <td>{{ $expense->title }}</td>
                    <td>{{ number_format($expense->amount) }}</td>
                    <td>{{ \Carbon\Carbon::parse($expense->expense_date)->format('Y-m-d') }}</td>
                    <td>{{ $expense->description }}</td>
                    <td>
                        <a href="{{ route('expenses.edit', $expense) }}" class="btn btn-sm btn-primary">ویرایش</a>
                        <form action="{{ route('expenses.destroy', $expense) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('آیا مطمئن هستید؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $expenses->links() }}
</div>
@endsection
