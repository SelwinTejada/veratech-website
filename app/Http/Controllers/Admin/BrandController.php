<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Services\AuditService;
use App\Services\MediaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BrandController extends Controller
{
    public function index(): View
    {
        return view('admin.brands.index', ['brands' => Brand::orderBy('sort_order')->paginate(20)]);
    }

    public function create(): View
    {
        return view('admin.brands.form', ['brand' => new Brand()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        if ($request->hasFile('logo_file')) {
            $data['logo'] = MediaService::store($request->file('logo_file'), 'brands')->path;
        }
        unset($data['logo_file']);
        $brand = Brand::create($data);
        AuditService::log('brand.create', "Created brand {$brand->name}", $brand);
        return redirect()->route('admin.brands.index')->with('success', 'Brand created.');
    }

    public function edit(Brand $brand): View
    {
        return view('admin.brands.form', ['brand' => $brand]);
    }

    public function update(Request $request, Brand $brand): RedirectResponse
    {
        $data = $this->validated($request, $brand);
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        if ($request->hasFile('logo_file')) {
            $data['logo'] = MediaService::store($request->file('logo_file'), 'brands')->path;
        }
        unset($data['logo_file']);
        $brand->update($data);
        AuditService::log('brand.update', "Updated brand {$brand->name}", $brand);
        return redirect()->route('admin.brands.index')->with('success', 'Brand updated.');
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        AuditService::log('brand.delete', "Deleted brand {$brand->name}", $brand);
        $brand->delete();
        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted.');
    }

    public function show(Brand $brand): RedirectResponse
    {
        return redirect()->route('admin.brands.edit', $brand);
    }

    protected function validated(Request $request, ?Brand $brand = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'slug' => ['nullable', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
            'website' => ['nullable', 'url', 'max:200'],
            'is_active' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'logo_file' => ['nullable', 'image', 'max:4096'],
        ]);
    }
}