<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    private int $pageSize = 5;

    public function index(Request $request)
    {
        $pageIndex = (int)($request->input('pageIndex', 1));
        $search = $request->input('search');
        $column = $request->input('column');
        $orderBy = $request->input('orderBy');

        $query = Product::query();
// search binary -> like arabi classes
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('brand', 'like', "%$search%");
            });
        }


        $validColumns = ['id', 'name', 'brand', 'category', 'price', 'created_at'];
        $validOrderBy = ['desc', 'asc'];
        if (!in_array($column, $validColumns)) {
            $column = 'id';
        }
        if (!in_array($orderBy, $validOrderBy)) {
            $orderBy = 'desc';
        }
        $query->orderBy($column, $orderBy);


        $count = $query->count();
        $totalPages = (int)ceil($count / $this->pageSize);
        if ($pageIndex < 1) $pageIndex = 1;
        $products = $query->skip(($pageIndex - 1) * $this->pageSize)->take($this->pageSize)->get();

        return view('products.index', [
            'products' => $products,
            'PageIndex' => $pageIndex,
            'TotalPages' => $totalPages,
            'Search' => $search ?? '',
            'Column' => $column,
            'OrderBy' => $orderBy,
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        if (!$request->hasFile('image_file')) {
            return back()->withErrors(['image_file' => 'The image file is required'])->withInput();
        }

        $file = $request->file('image_file');
        $newFileName = now()->format('YmdHisv') . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('products'), $newFileName);

        $product = new Product();
        $product->name = $request->input('name');
        $product->brand = $request->input('brand');
        $product->category = $request->input('category');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->image_file_name = $newFileName;
        $product->created_at = now();
        $product->save();

        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.products.index');
        }
        return view('products.edit', [
            'product' => $product,
            'ProductId' => $product->id,
            'ImageFileName' => $product->image_file_name,
            'CreatedAt' => $product->created_at->format('m/d/Y'),
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.products.index');
        }

        $newFileName = $product->image_file_name;
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $newFileName = now()->format('YmdHisv') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('products'), $newFileName);
            $oldImagePath = public_path('products/' . $product->image_file_name);
            if (file_exists($oldImagePath)) {
                @unlink($oldImagePath);
            }
        }

        $product->name = $request->input('name');
        $product->brand = $request->input('brand');
        $product->category = $request->input('category');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->image_file_name = $newFileName;
        $product->save();

        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.products.index');
        }
        $imagePath = public_path('products/' . $product->image_file_name);
        if (file_exists($imagePath)) {
            @unlink($imagePath);
        }
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
