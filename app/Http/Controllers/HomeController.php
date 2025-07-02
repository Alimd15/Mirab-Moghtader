<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::orderByDesc('id')->take(4)->get();
        return view('home.index', ['products' => $products]);
    }

    public function privacy()
    {
        return view('home.privacy');
    }

    public function error(Request $request)
    {
        $requestId = $request->header('X-Request-Id') ?? null;
        return view('shared.error', [
            'RequestId' => $requestId,
        ]);
    }
}
