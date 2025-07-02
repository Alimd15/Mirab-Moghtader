@extends('layouts.app')
@section('title', 'محصول جدید')
@section('content')
<div class="row" dir="rtl">
    <div class="col-md-8 mx-auto rounded border p-3">
        <h2 class="text-center mb-5">محصول جدید</h2>
        <form method="post" enctype="multipart/form-data" action="{{ route('admin.products.store') }}">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">نام محصول</label>
                <div class="col-sm-8">
                    <input class="form-control" name="name" value="{{ old('name') }}">
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">برند</label>
                <div class="col-sm-8">
                    <input class="form-control" name="brand" value="{{ old('brand') }}">
                    @error('brand')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">دسته بندی</label>
                <div class="col-sm-8">
                    <select class="form-select" dir="ltr" name="category">
                        <option value='Other'>سایر</option>
                        <option value='Phones'>موبایل</option>
                        <option value='Computers'>کامپیوتر</option>
                        <option value='Accessories'>لوازم جانبی</option>
                        <option value='Printers'>پرینتر</option>
                        <option value='Cameras'>دوربین</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">قیمت (تومان)</label>
                <div class="col-sm-8">
                    <input class="form-control" name="price" value="{{ old('price') }}">
                    @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">توضیحات</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-4 col-form-label">تصویر محصول</label>
                <div class="col-sm-8">
                    <input class="form-control" type="file" name="image_file">
                    @error('image_file')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row">
                <div class="offset-sm-4 col-sm-4 d-grid">
                    <button type="submit" class="btn btn-primary">ثبت محصول</button>
                </div>
                <div class="col-sm-4 d-grid">
                    <a class="btn btn-outline-primary" href="{{ route('admin.products.index') }}" role="button">انصراف</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 