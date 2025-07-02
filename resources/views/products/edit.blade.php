@extends('layouts.app')
@section('title', 'ویرایش محصول')
@section('content')
<div class="row" dir="rtl">
    <div class="col-md-8 mx-auto rounded border p-3">
        <h2 class="text-center mb-5">ویرایش محصول</h2>
        <form method="post" enctype="multipart/form-data" action="{{ route('admin.products.update', $ProductId) }}">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">شناسه</label>
                <div class="col-sm-8">
                    <input class="form-control-plaintext" readonly value="{{ $ProductId }}">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">نام محصول</label>
                <div class="col-sm-8">
                    <input class="form-control" name="name" value="{{ old('name', $product->name ?? '') }}">
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">برند</label>
                <div class="col-sm-8">
                    <input class="form-control" name="brand" value="{{ old('brand', $product->brand ?? '') }}">
                    @error('brand')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">دسته بندی</label>
                <div class="col-sm-8">
                    <select class="form-select" dir="ltr" name="category">
                        <option value='Other' {{ (old('category', $product->category ?? '') == 'Other') ? 'selected' : '' }}>سایر</option>
                        <option value='Phones' {{ (old('category', $product->category ?? '') == 'Phones') ? 'selected' : '' }}>موبایل</option>
                        <option value='Computers' {{ (old('category', $product->category ?? '') == 'Computers') ? 'selected' : '' }}>کامپیوتر</option>
                        <option value='Accessories' {{ (old('category', $product->category ?? '') == 'Accessories') ? 'selected' : '' }}>لوازم جانبی</option>
                        <option value='Printers' {{ (old('category', $product->category ?? '') == 'Printers') ? 'selected' : '' }}>پرینتر</option>
                        <option value='Cameras' {{ (old('category', $product->category ?? '') == 'Cameras') ? 'selected' : '' }}>دوربین</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">قیمت (تومان)</label>
                <div class="col-sm-8">
                    <input class="form-control" name="price" value="{{ old('price', $product->price ?? '') }}">
                    @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">توضیحات</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="description">{{ old('description', $product->description ?? '') }}</textarea>
                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-4 col-sm-8">
                    <img src="/products/{{ $ImageFileName }}" width="150">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">تصویر جدید</label>
                <div class="col-sm-8">
                    <input class="form-control" type="file" name="image_file">
                    @error('image_file')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">تاریخ ایجاد</label>
                <div class="col-sm-8">
                    <input class="form-control-plaintext" readonly value="{{ $CreatedAt }}">
                </div>
            </div>
            <div class="row">
                <div class="offset-sm-4 col-sm-4 d-grid">
                    <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                </div>
                <div class="col-sm-4 d-grid">
                    <a class="btn btn-outline-primary" href="{{ route('admin.products.index') }}" role="button">انصراف</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 