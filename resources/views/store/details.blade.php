@extends('layouts.app')
@section('title', $product->name)
@section('content')
    <div class="row">
        <div class="col-md-4 text-center">
            <img src="/products/{{ $product->image_file_name }}" class="img-fluid mb-3" alt="..." width="250" />
        </div>
        <div class="col-md-8">
            <button type="button" class="btn btn-outline-secondary mb-3" onclick="window.history.back()">
                <i class="bi bi-arrow-right"></i> بازگشت
            </button>
            <h3 class="mb-3">{{ $product->name }}</h3>
            <h3 class="mb-3">{{ $product->price }} تومان</h3>
            <button type="button" class="btn btn-warning btn-sm" onclick="addToCart(this, {{ $product->id }})">
                افزودن به سبد خرید <i class="bi bi-cart4"></i>
            </button>
            <hr />
            <div class="row mb-3">
                <div class="col-sm-3 fw-bold">برند</div>
                <div class="col-sm-9">{{ $product->brand }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 fw-bold">دسته بندی</div>
                <div class="col-sm-9">
                    @switch($product->category)
                        @case('Phones')
                        گوشی ها
                        @break
                        @case('Computers')
                        کامپیوتر ها
                        @break
                        @case('Accessories')
                        لوازم جانبی
                        @break
                        @case('Printers')
                        پرینتر ها
                        @break
                        @case('Cameras')
                        دوربین ها
                        @break
                        @case('Other')
                        غیره
                        @break
                        @default
                        {{ $product->category }}
                    @endswitch
                </div>
            </div>
            <div class="fw-bold">توضیحات</div>
            <div style="white-space: pre-line">{{ $product->description }}</div>
        </div>
    </div>
@endsection
