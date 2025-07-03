<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\ViewModels\StoreSearchModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class StoreController extends Controller
{
    private int $pageSize = 8;

    public function index(Request $request)
    {
        $pageIndex = (int)($request->input('pageIndex', 1));
        $search = $request->input('search');
        $brand = $request->input('brand');
        $category = $request->input('category');
        $sort = $request->input('sort');

        $query = Product::query();


        $allBrands = Product::select('brand')->distinct()->orderBy('brand')->pluck('brand');


        if (!empty($search)) {
            $query->where('name', 'like', "%$search%");
        }


        if (!empty($brand)) {
            $query->where('brand', 'like', "%$brand%");
        }
        if (!empty($category)) {
            $query->where('category', 'like', "%$category%");
        }


        if ($sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->orderBy('id', 'desc');
        }


        $count = $query->count();
        $totalPages = (int)ceil($count / $this->pageSize);
        if ($pageIndex < 1) $pageIndex = 1;
        $products = $query->skip(($pageIndex - 1) * $this->pageSize)->take($this->pageSize)->get();


        $storeSearchModel = new StoreSearchModel();
        $storeSearchModel->search = $search;
        $storeSearchModel->brand = $brand;
        $storeSearchModel->category = $category;
        $storeSearchModel->sort = $sort;

        return view('store.index', [
            'Brands' => $allBrands,
            'Products' => $products,
            'PageIndex' => $pageIndex,
            'TotalPages' => $totalPages,
            'storeSearchModel' => $storeSearchModel,
        ]);
    }

    public function details($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('store.index');
        }
        return view('store.details', ['product' => $product]);
    }
}
