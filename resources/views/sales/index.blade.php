@extends('layouts.app')

@section('content')
<div class="container">
    <h2>🧾 لیست فروش‌ها</h2>
    <a href="{{ route('sales.create') }}" class="btn btn-success mb-3">➕ ثبت فروش جدید</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>مشتری</th>
                <th>محصول</th>
                <th>تعداد</th>
                <th>قیمت واحد</th>
                <th>نوع پرداخت</th>
                <th>پرداخت شده</th>
                <th>تاریخ</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
            <tr>
                <td>{{ $sale->customer->name }}</td>
                <td>{{ $sale->product }}</td>
                <td>{{ $sale->quantity }}</td>
                <td>{{ number_format($sale->price) }}</td>
                <td>{{ $sale->payment_type }}</td>
                <td>{{ number_format($sale->paid) }}</td>
                <td>{{ $sale->created_at }}</td>
               <td>
    <a href="{{ route('sales.edit', $sale) }}" class="btn btn-primary btn-sm">ویرایش</a>

    <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display: inline-block; margin-left: 5px;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm" onclick="return confirm('حذف شود؟')">حذف</button>
    </form>
</td>

            </tr>
            @endforeach
        </tbody>
    </table>
     <!-- صفحه‌بندی -->
    <div class="d-flex justify-content-center">
        {{ $sales->links() }}
    </div>
</div>
@endsection
