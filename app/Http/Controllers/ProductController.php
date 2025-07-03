<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    private int $pageSize = 5;

    public function index(Request $request)
    {
        $search = $request->input('search');
        $column = $request->input('column', 'id');
        $orderBy = $request->input('orderBy', 'desc');

        $validColumns = ['id', 'name', 'brand', 'category', 'price', 'created_at'];
        $validOrders = ['asc', 'desc'];

        if (!in_array(strtolower($column), $validColumns)) {
            $column = 'id';
        }

        if (!in_array(strtolower($orderBy), $validOrders)) {
            $orderBy = 'desc';
        }

        $query = Product::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('brand', 'like', "%$search%");
            });
        }

        $query->orderBy($column, $orderBy);

        $products = $query->paginate($this->pageSize)->appends([
            'search' => $search,
            'column' => $column,
            'orderBy' => $orderBy,
        ]);

        return view('admin.products.index', compact('products', 'search', 'column', 'orderBy'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image_file')) {
            $data['image_file_name'] = $request->file('image_file')->store('products', 'public');
        } else {
            return back()->withErrors(['image_file' => 'تصویر محصول الزامی است'])->withInput();
        }

        $data['created_at'] = now();

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'محصول با موفقیت ایجاد شد.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validated();

        if ($request->hasFile('image_file')) {
            // hszf tasvir ghabli
            if ($product->image_file_name) {
                Storage::disk('public')->delete($product->image_file_name);
            }
            $data['image_file_name'] = $request->file('image_file')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'محصول با موفقیت به‌روزرسانی شد.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image_file_name) {
            Storage::disk('public')->delete($product->image_file_name);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'محصول با موفقیت حذف شد.');
    }
}
