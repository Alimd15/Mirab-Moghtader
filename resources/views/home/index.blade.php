@extends('layouts.app')

@section('title', 'Home Page')
@section('content')
@php($HomePage = true)
<div style="background-color: cornflowerblue;" class="rounded">
    <div class="container text-white py-5">
        <div class="row align-items-center g-5">
            <div class="col-md-6">
                <h1 class="mb-5 display-2"><strong>بهترین فروشگاه دیجیتالی</strong></h1>
                <p>
                    جدیدترین محصولات الکترونیکی از معتبرترین برندها با قیمت مناسب را در فروشگاه ما بیابید.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('hero.png') }}" class="img-fluid" alt="فروشگاه آنلاین" />
            </div>
        </div>
    </div>
</div>

<div class="bg-light">
    <div class="container py-4">
        <h2 class="pb-4 text-center">جدیدترین محصولات</h2>
        <div class="row mb-5 g-3">
            @foreach($products as $product)
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
    </div>
</div>
@endsection
