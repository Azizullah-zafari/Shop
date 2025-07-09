@extends('layouts.app') {{-- یا master یا هر قالبی که داری --}}

@section('content')
<div class="container">
<center>    <h1>داشبورد فروشگاه</h1>
</center>
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 mb-3 bg-success text-white center align-items-center" >
                <h3>مجموع فروش</h3>
                <p>{{ number_format($totalSales) }} افغانی</p>
            </div>
        </div>
   

    {{-- <div class="col-md-4">
        <div class="card p-3 mb-3 bg-primary text-white">
            <h3>مجموع سود</h3>
            <p>{{ number_format($totalProfit) }} افغانی</p>
        </div>
    </div> --}}



        <div class="col-md-4">
            <div class="card p-3 mb-3 bg-danger text-white center align-items-center">
                <h3>مجموع قرض</h3>
                <p>{{ number_format($totalDebt) }} افغانی</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 mb-3 bg-info text-white center align-items-center">
                <h3>تعداد مشتریان</h3>
                <p>{{ $totalCustomers }}</p>
            </div>
        </div>
        <div class="col-md-4">
    {{-- <div class="card p-3 mb-3 bg-info text-white">
        <h3>تعداد مشتری‌های قرض‌دار</h3>
        <p>{{ $customersWithDebtCount }}</p>
    </div> --}}
    <div class="col-md-12">
    <div class="card p-3 mb-3">
        <h4>📋 لیست مشتری‌های قرض‌دار</h4>
        <div style="max-height: 200px; overflow-y: auto;"> {{-- Scroll محدود --}}
            <ul class="list-group">
                @forelse($customersWithDebt as $customer)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $customer->name }}
                        <span class="badge bg-danger">{{ $customer->sales->sum(fn($s) => $s->remaining) }} افغانی قرض</span>
                    </li>
                @empty
                    <li class="list-group-item">مشتری قرض‌دار وجود ندارد.</li>
                @endforelse
            </ul>
        </div>

        {{-- لینک‌های صفحه‌بندی --}}
        <div class="mt-2">
            {{ $customersWithDebt->links() }}
        </div>
    </div>
</div>

</div>

    </div>
</div>
@endsection
