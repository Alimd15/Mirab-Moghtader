{{--<!DOCTYPE html>--}}
{{--<html lang="fa" dir="rtl">--}}
{{--<head>--}}
{{--    <meta charset="utf-8" />--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0" />--}}
{{--    <title>@yield('title', 'فروشگاه آنلاین')</title>--}}
{{--    <link rel="icon" href="{{ asset('icon.svg') }}" />--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}
{{--    <link rel="stylesheet" href="{{ asset('lib/bootstrap/dist/css/bootstrap.min.css') }}" />--}}
{{--    <link rel="stylesheet" href="{{ asset('css/site.css') }}" />--}}
{{--    <link rel="stylesheet" href="{{ asset('StoreMVC.styles.css') }}" />--}}
{{--    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}" />--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />--}}
{{--</head>--}}
{{--<body>--}}
{{--    <header>--}}
{{--        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow ">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ route('home.index') }}">--}}
{{--                    <img src="{{ asset('icon.svg') }}" alt="فروشگاه آنلاین" width="30" class="mx-2" /> فروشگاه آنلاین--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-controls="navbarSupportedContent"--}}
{{--                        aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}
{{--                <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">--}}
{{--                    <ul class="navbar-nav flex-grow-1">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link text-dark" href="{{ route('home.index') }}">صفحه اصلی</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link text-dark" href="{{ route('store.index') }}">محصولات</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link text-dark" href="{{ route('home.privacy') }}">حریم خصوصی</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <ul class="navbar-nav">--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                ادمین--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a class="dropdown-item" href="{{ route('admin.products.index') }}">کالا ها</a></li>--}}
{{--                                <li><a class="dropdown-item" href="{{ route('home.index') }}">پروفایل</a></li>--}}
{{--                                <li><hr class="dropdown-divider"></li>--}}
{{--                                <li><a class="dropdown-item" href="{{ route('home.index') }}">خروج</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}
{{--    </header>--}}
{{--    @if (!isset($HomePage))--}}
{{--    <div class="container mt-3">--}}
{{--        <main role="main" class="pb-3">--}}
{{--            @yield('content')--}}
{{--        </main>--}}
{{--    </div>--}}
{{--    @else--}}
{{--        @yield('content')--}}
{{--    @endif--}}
{{--    <footer class="border-top footer text-muted">--}}
{{--        <div class="container">--}}
{{--            <img src="{{ asset('icon.svg') }}" alt="فروشگاه آنلاین" width="30" class="mx-2" />--}}
{{--            &copy; 2025 - فروشگاه آنلاین - <a href="{{ route('home.privacy') }}">Privacy</a>--}}
{{--        </div>--}}
{{--    </footer>--}}
{{--    <script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>--}}
{{--    <script src="{{ asset('lib/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>--}}
{{--    <script src="{{ asset('js/site.js') }}"></script>--}}
{{--    @yield('scripts')--}}
{{--</body>--}}
{{--</html>--}}

---


<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'فروشگاه آنلاین')</title>

    <link rel="icon" href="{{ asset('icon.svg') }}" />

    <!-- Bootstrap RTL (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>
<!-- Header -->
<header>
    <nav class="navbar navbar-expand-sm navbar-light bg-white border-bottom shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <img src="{{ asset('icon.svg') }}" alt="فروشگاه آنلاین" width="30" class="mx-2" />
                فروشگاه آنلاین
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                <ul class="navbar-nav flex-grow-1">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home.index') }}">صفحه اصلی</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('store.index') }}">محصولات</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home.privacy') }}">حریم خصوصی</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            ادمین
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end text-end">
                            <li><a class="dropdown-item" href="{{ route('admin.products.index') }}">کالاها</a></li>
                            <li><a class="dropdown-item" href="#">پروفایل</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">خروج</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Content -->
@if (!isset($HomePage))
    <div class="container mt-3">
        <main class="pb-3">
            @yield('content')
        </main>
    </div>
@else
    @yield('content')
@endif

<!-- Footer -->
<footer class="border-top footer text-muted mt-4">
    <div class="container">
        <img src="{{ asset('icon.svg') }}" alt="فروشگاه آنلاین" width="30" class="mx-2" />
        &copy; 2025 - فروشگاه آنلاین - <a href="{{ route('home.privacy') }}">Privacy</a>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/site.js') }}"></script>
@yield('scripts')
</body>
</html>
```

---


