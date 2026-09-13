<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Services\AuditService;
use App\Services\MediaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('admin.products.index', ['products' => Product::with('brand')->latest()->paginate(20)]);
    }

    public function create(): View
    {
        return view('admin.products.form', ['product' => new Product(), 'brands' => Brand::orderBy('name')->get()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        if ($request->hasFile('image_file')) {
            $data['image'] = MediaService::store($request->file('image_file'), 'products')->path;
        }
        unset($data['image_file']);
        $product = Product::create($data);
        AuditService::log('product.create', "Created product {$product->name}", $product);
        return redirect()->route('admin.products.index')->with('success', 'Product created.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.form', [
            'product' => $product,
            'brands' => Brand::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        if ($request->hasFile('image_file')) {
            $data['image'] = MediaService::store($request->file('image_file'), 'products')->path;
        }
        unset($data['image_file']);
        $product->update($data);
        AuditService::log('product.update', "Updated product {$product->name}", $product);
        return redirect()->route('admin.products.index')->with('success', 'Product updated.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        AuditService::log('product.delete', "Deleted product {$product->name}", $product);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
    }

    public function show(Product $product): RedirectResponse
    {
        return redirect()->route('admin.products.edit', $product);
    }

    protected function validated(Request $request): array
    {
        return $request->validate([
            'brand_id' => ['nullable', 'exists:brands,id'],
            'name' => ['required', 'string', 'max:150'],
            'slug' => ['nullable', 'string', 'max:180'],
            'summary' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'sku' => ['nullable', 'string', 'max:80'],
            'is_active' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'image_file' => ['nullable', 'image', 'max:4096'],
        ]);
    }
}