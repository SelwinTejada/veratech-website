@extends('layouts.admin')
@section('page_title', $product->exists ? 'Edit product' : 'New product')

@section('content')
<form method="POST" action="{{ $product->exists ? route('admin.products.update', $product) : route('admin.products.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-4">
    @csrf @if ($product->exists) @method('PUT') @endif
    <div><label class="block text-sm font-medium">Brand</label>
        <select name="brand_id" class="mt-1 w-full rounded-md border-slate-300">
            <option value="">— None —</option>
            @foreach ($brands as $b)
                <option value="{{ $b->id }}" @selected(old('brand_id', $product->brand_id) == $b->id)>{{ $b->name }}</option>
            @endforeach
        </select></div>
    <div><label class="block text-sm font-medium">Name</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" required class="mt-1 w-full rounded-md border-slate-300"></div>
    <div><label class="block text-sm font-medium">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $product->slug) }}" class="mt-1 w-full rounded-md border-slate-300"></div>
    <div><label class="block text-sm font-medium">SKU</label>
        <input type="text" name="sku" value="{{ old('sku', $product->sku) }}" class="mt-1 w-full rounded-md border-slate-300"></div>
    <div><label class="block text-sm font-medium">Summary</label>
        <textarea name="summary" rows="2" class="mt-1 w-full rounded-md border-slate-300">{{ old('summary', $product->summary) }}</textarea></div>
    <div><label class="block text-sm font-medium">Body</label>
        <textarea name="body" rows="6" class="mt-1 w-full rounded-md border-slate-300">{{ old('body', $product->body) }}</textarea></div>
    <div><label class="block text-sm font-medium">Image</label>
        <input type="file" name="image_file" accept="image/*" class="mt-1 w-full"></div>
    <div><label class="block text-sm font-medium">Sort order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $product->sort_order ?? 0) }}" class="mt-1 w-32 rounded-md border-slate-300"></div>
    <label class="inline-flex items-center gap-2 text-sm">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $product->is_active ?? true))> Active
    </label>
    <div class="flex gap-2">
        <button class="px-4 py-2 rounded-md bg-sky-600 text-white text-sm font-semibold">Save</button>
        <a href="{{ route('admin.products.index') }}" class="px-4 py-2 rounded-md border border-slate-300 text-sm">Cancel</a>
    </div>
</form>
@endsection