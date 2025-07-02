@extends('layouts.app')
@section('title', 'خطا')
@section('content')
<div class="error-page">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="error-icon mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#dc3545" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                    </svg>
                </div>
                <h1 class="text-danger mb-3">خطایی رخ داد!</h1>
                <h2 class="mb-4">در پردازش درخواست شما مشکلی پیش آمد</h2>
                <div class="error-card p-4 mb-4 text-start">
                    @if (!empty($RequestId))
                        <div class="mb-3">
                            <strong>شناسه درخواست:</strong>
                            <div class="request-id">{{ $RequestId }}</div>
                        </div>
                    @endif
                    <p class="mb-3">
                        <i class="bi bi-info-circle-fill text-primary me-2"></i>
                        تیم پشتیبانی ما از این خطا مطلع شده و در حال بررسی آن است.
                    </p>
                    <p>
                        <i class="bi bi-clock-history text-primary me-2"></i>
                        لطفاً چند دقیقه دیگر مجدداً تلاش کنید.
                    </p>
                </div>
                <div class="actions mt-4">
                    <a href="/" class="btn btn-primary me-2">
                        <i class="bi bi-house-door"></i> بازگشت به صفحه اصلی
                    </a>
                    <a href="mailto:support@yourdomain.com" class="btn btn-outline-secondary">
                        <i class="bi bi-envelope"></i> تماس با پشتیبانی
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .error-page {
        min-height: 100vh;
        background-color: #f8f9fa;
    }
    .error-icon {
        animation: bounce 2s infinite;
    }
    .error-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-right: 4px solid #dc3545;
    }
    .request-id {
        font-family: monospace;
        background: #f1f1f1;
        padding: 5px 10px;
        border-radius: 4px;
        word-break: break-all;
    }
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-20px);
        }
        60% {
            transform: translateY(-10px);
        }
    }
</style>
@endsection 