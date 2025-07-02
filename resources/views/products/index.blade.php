@extends('layouts.app')
@section('title', 'لیست محصولات')
@section('content')
    @php
        $pageIndex = $PageIndex;
        $totalPages = $TotalPages;
        $search = $Search;
        $column = $Column;
        $orderBy = $OrderBy;
        function getArrow($tableColumn, $column, $orderBy) {
            if ($tableColumn !== $column) return '';
            return $orderBy === 'desc' ? "<i class='bi bi-arrow-down'></i>" : "<i class='bi bi-arrow-up'></i>";
        }
        function toPersianDate($date) {
            // You may use a package for Persian date, here is a simple fallback
            return \Carbon\Carbon::parse($date)->format('Y/m/d');
        }
    @endphp
    <h2 class="text-center mb-5">لیست محصولات</h2>
    <div class="row mb-5" dir="rtl">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('admin.products.create') }}">محصول جدید</a>
        </div>
        <div class="col">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" name="search" value="{{ $search }}" placeholder="جستجو بر اساس نام یا برند" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">جستجو</button>
            </form>
        </div>
    </div>
    <script>
        function sortTable(column) {
            let orderBy = 'desc';
            let currentColumn = '{{ $column }}';
            let currentOrder = '{{ $orderBy }}';
            if (column === currentColumn) {
                orderBy = currentOrder === 'asc' ? 'desc' : 'asc';
            }
            window.location.href = `?search={{ $search }}&column=${column}&orderBy=${orderBy}`;
        }
    </script>
    <table class="table" dir="rtl">
        <thead>
        <tr>
            <th style="cursor: pointer;" onclick="sortTable('id')">شناسه {!! getArrow('id', $column, $orderBy) !!}</th>
            <th style="cursor: pointer;" onclick="sortTable('name')">نام {!! getArrow('name', $column, $orderBy) !!}</th>
            <th style="cursor: pointer;" onclick="sortTable('brand')">برند {!! getArrow('brand', $column, $orderBy) !!}</th>
            <th style="cursor: pointer;" onclick="sortTable('category')">دسته‌بندی {!! getArrow('category', $column, $orderBy) !!}</th>
            <th style="cursor: pointer;" onclick="sortTable('price')">قیمت {!! getArrow('price', $column, $orderBy) !!}</th>
            <th>تصویر</th>
            <th style="cursor: pointer;" onclick="sortTable('created_at')">تاریخ ایجاد {!! getArrow('created_at', $column, $orderBy) !!}</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->brand }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->price }}$</td>
                <td><img src="/products/{{ $product->image_file_name }}" width="100" /></td>
                <td>{{ toPersianDate($product->created_at) }}</td>
                <td style="white-space:nowrap">
                    <a class="btn btn-primary btn-sm" href="{{ route('admin.products.edit', $product->id) }}">ویرایش</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('admin.products.delete', $product->id) }}" onclick="return confirm('آیا مطمئن هستید؟')">حذف</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav>
        <ul class="pagination">
            @for ($i = 1; $i <= $totalPages; $i++)
                <li class="page-item {{ $i == $pageIndex ? 'active' : '' }}">
                    <a class="page-link" href="?pageIndex={{ $i }}&search={{ $search }}&column={{ $column }}&orderBy={{ $orderBy }}">{{ $i }}</a>
                </li>
            @endfor
        </ul>
    </nav>
@endsection
