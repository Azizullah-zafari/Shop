@extends('layouts.app')

@section('content')
<div class="container">
    <h2>💰 بدهکاران فروشگاه</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>مشتری</th>
                <th>محصول</th>
                <th>تعداد</th>
                <th>قیمت واحد (AF)</th>
                <th>مبلغ کل</th>
                <th>پرداخت شده</th>
                <th>باقی‌مانده</th>
            </tr>
        </thead>
        <tbody>
            @forelse($debts as $debt)
                <tr>
                    <td>{{ $debt->customer->name ?? '---' }}</td>
<td>{{ $debt->product }}</td> {{-- فقط رشته است، نه object --}}
                    <td>{{ $debt->quantity }}</td>
                    <td>{{ number_format($debt->price) }}</td>
                    <td>{{ number_format($debt->quantity * $debt->price) }}</td>
                    <td>{{ number_format($debt->paid) }}</td>
                    <td>{{ number_format(($debt->quantity * $debt->price) - $debt->paid) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">هیچ بدهکاری یافت نشد.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{-- <div class="mt-3">
    {{ $debts->links() }}
</div> --}}
    <!-- صفحه‌بندی -->
    <div class="d-flex justify-content-center">
        {{ $debts->links() }}
    </div>

</div>
@endsection
