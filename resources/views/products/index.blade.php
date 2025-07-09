@extends('layouts.app')

@section('content')
<div class="container">
    <h2>لیست محصولات</h2>
    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">افزودن محصول جدید</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
{{-- 
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>نام</th>
                <th>قیمت (افغانی)</th>
                <th>موجودی</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price) }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-sm">ویرایش</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('آیا حذف شود؟')" class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">هیچ محصولی یافت نشد.</td>
            </tr>
            @endforelse
        </tbody>
    </table> --}}
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>نام</th>
            <th>قیمت (افغانی)</th>
            <th>موجودی اولیه</th>
            <th>موجودی فعلی</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ number_format($product->price) }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->current_stock }}</td>
            <td>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-sm">ویرایش</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('آیا حذف شود؟')" class="btn btn-danger btn-sm">حذف</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">هیچ محصولی یافت نشد.</td>
        </tr>
        @endforelse
    </tbody>
</table>
 <div class="d-flex justify-content-center">
         {{ $products->links() }}
    </div>

</div>
@endsection
