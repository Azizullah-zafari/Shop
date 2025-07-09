@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📋 لیست مشتریان</h2>
    <a href="{{ route('customers.create') }}" class="btn btn-success mb-3">➕ افزودن مشتری جدید</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>نام</th>
                <th>شماره تماس</th>
                <th>آدرس</th>
                <th>نوع</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->type }}</td>
                <td>
                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-sm">ویرایش</a>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline-block;">
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
        {{ $customers->links() }}
    </div>

{{-- {{ $customers->links() }} --}}

</div>
@endsection
