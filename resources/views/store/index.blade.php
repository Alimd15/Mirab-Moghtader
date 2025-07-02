@extends('layouts.app')
@section('title', 'محصولات')
@section('content')
<h2 class="pb-4 text-center">محصولات</h2>
<form class="row g-3 mb-3">
    <div class="col-lg-2 col-md-4">
        <select class="form-select" name="brand" dir="ltr" onchange="this.form.submit()">
            <option value="">تمامی برندها</option>
            @foreach ($Brands as $brand)
                <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>{{ $brand }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-2 col-md-4">
        <select class="form-select" name="category" dir="ltr" onchange="this.form.submit()">
            <option value="">تمام دسته بندی ها</option>
            <option value="Phones" {{ request('category') == 'Phones' ? 'selected' : '' }}>گوشی ها</option>
            <option value="Computers" {{ request('category') == 'Computers' ? 'selected' : '' }}>کامپیوتر ها</option>
            <option value="Accessories" {{ request('category') == 'Accessories' ? 'selected' : '' }}>لوازم جانبی</option>
            <option value="Printers" {{ request('category') == 'Printers' ? 'selected' : '' }}>پرینتر ها</option>
            <option value="Cameras" {{ request('category') == 'Cameras' ? 'selected' : '' }}>دوربین ها</option>
            <option value="Other" {{ request('category') == 'Other' ? 'selected' : '' }}>غیره</option>
        </select>
    </div>
    <div class="col-lg-2 col-md-4">
        <select class="form-select" name="sort" dir="ltr" onchange="this.form.submit()">
            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>جدید ترین کالا ها</option>
            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>قیمت: کم به زیاد</option>
            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>قیمت: زیاد به کم</option>
        </select>
    </div>
    <div class="col-lg-6 col-md-12 d-flex">
        <input class="form-control me-2" name="search" value="{{ request('search') }}" placeholder="تایپ کن">
        <button class="btn btn-outline-success" type="submit">سرچ</button>
    </div>
</form>
<div class="row mb-5 g-3">
    @foreach ($Products as $product)
        <div class="col-lg-3 col-md-6">
            <div class="rounded border shadow p-3 text-center h-100 d-flex flex-column">
                <img src="/products/{{ $product->image_file_name }}" class="img-fluid mb-3" alt="{{ $product->name }}" style="height: 180px; object-fit: contain" />
                <div class="mt-auto">
                    <hr />
                    <h5 class="py-2">{{ $product->name }}</h5>
                    <p>
                        برند: {{ $product->brand }}, دسته بندی: {{ $product->category }}
                    </p>
                    <h4 class="mb-3">${{ $product->price }}</h4>
                    <a class="btn btn-primary btn-sm mb-2 mx-auto" href="{{ route('store.details', $product->id) }}" role="button">توضیحات</a>
                    <button type="button" class="btn btn-warning btn-sm mb-2">
                        اضافه کردن به سبد خرید <i class="bi bi-cart4"></i>
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</div>
<nav>
    <ul class="pagination">
        @for ($i = 1; $i <= $TotalPages; $i++)
            <li class="page-item {{ $i == $PageIndex ? 'active' : '' }}">
                <a class="page-link" href="?pageIndex={{ $i }}&search={{ request('search') }}&brand={{ request('brand') }}&category={{ request('category') }}&sort={{ request('sort') }}">{{ $i }}</a>
            </li>
        @endfor
    </ul>
</nav>
@endsection 