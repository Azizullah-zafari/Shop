@extends('layouts.app')

@section('content')
<div class="container">
    <h2>💵 لیست پرداخت‌ها</h2>
    <a href="{{ route('payments.create') }}" class="btn btn-success mb-3">➕ پرداخت جدید</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>مشتری</th>
                <th>محصول</th>
                <th>مقدار پرداخت</th>
                <th>تاریخ</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->sale->customer->name }}</td>
                <td>{{ $payment->sale->product }}</td>
                <td>{{ number_format($payment->amount) }}</td>
                <td>{{ $payment->paid_at }}</td>
               <td>
    <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-sm btn-primary">ویرایش</a>

    <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display: inline-block; margin-right: 5px;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm" onclick="return confirm('حذف شود؟')">حذف</button>
    </form>
</td>

            </tr>
            @endforeach
        </tbody>
    </table>
  
 <div class="d-flex justify-content-center">
         {{ $payments->links() }}
    </div>
</div>
@endsection
